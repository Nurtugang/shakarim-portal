document.addEventListener('DOMContentLoaded', function () {
    const chatToggle = document.getElementById('chat-toggle');
    const chatWindow = document.getElementById('chat-window');
    const collapseChat = document.getElementById('collapse-chat');
    const closeChat = document.getElementById('close-chat');
    const chatInput = document.getElementById('chat-input');
    const chatSend = document.getElementById('chat-send');
    const chatMessages = document.getElementById('chat-messages');
    const chatRoleScreen = document.getElementById('chat-role-screen');
    const roleButtons = document.querySelectorAll('.chat-role-option');
    const botAvatar = '/img/chat_avatar.webp';

    let selectedRole = null;
    const mobileMediaQuery = window.matchMedia('(max-width: 767px)');

    const syncBodyScrollLock = () => {
        document.body.classList.toggle('overflow-hidden', mobileMediaQuery.matches && !chatWindow.classList.contains('hidden'));
        chatToggle.classList.toggle('hidden', mobileMediaQuery.matches && !chatWindow.classList.contains('hidden'));
    };

    const focusInputIfHelpful = () => {
        if (!mobileMediaQuery.matches) {
            chatInput.focus();
        }
    };

    const openChat = () => {
        chatWindow.classList.remove('hidden');
        syncBodyScrollLock();
        focusInputIfHelpful();
    };

    const hideChat = () => {
        chatWindow.classList.add('hidden');
        syncBodyScrollLock();
    };

    const escapeHtml = (value) =>
        value
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#39;');

    const scrollToBottom = () => {
        chatMessages.scrollTop = chatMessages.scrollHeight;
    };

    const renderUserMessage = (message) => {
        chatMessages.insertAdjacentHTML(
            'beforeend',
            `
                <div class="self-end max-w-[92%] md:max-w-[88%] bg-shakarim-blue text-white px-3.5 py-3 md:px-4 rounded-2xl rounded-br-md shadow-sm break-words text-[13px] md:text-sm">
                    ${escapeHtml(message)}
                </div>
            `
        );
    };

    const renderBotMessage = (message, extraClasses = '') => {
        chatMessages.insertAdjacentHTML(
            'beforeend',
            `
                <div class="flex items-start gap-2.5 md:gap-3 self-start max-w-[94%] md:max-w-[92%] ${extraClasses}">
                    <img src="${botAvatar}" alt="AI-Sha" class="w-8 h-8 rounded-full object-cover shadow-sm flex-shrink-0 mt-1">
                    <div class="bg-white text-slate-700 px-3.5 py-3 md:px-4 rounded-2xl rounded-tl-md shadow-sm border border-slate-200 break-words text-[13px] md:text-sm">
                        ${message}
                    </div>
                </div>
            `
        );
    };

    const setSelectedRole = (role) => {
        selectedRole = role;

        roleButtons.forEach((button) => {
            const isActive = button.dataset.role === role;
            button.classList.toggle('border-shakarim-blue', isActive);
            button.classList.toggle('bg-blue-50', isActive);
            button.classList.toggle('text-shakarim-blue', isActive);
        });

        if (chatRoleScreen) {
            chatRoleScreen.classList.add('hidden');
        }

        renderBotMessage(`${window.chatTranslations.roleSelectedPrefix} <strong>${escapeHtml(role)}</strong>. ${window.chatTranslations.roleSelectedHint}`);
        scrollToBottom();
    };

    const sendMessage = async () => {
        const question = chatInput.value.trim();
        if (!question) return;

        if (!selectedRole) {
            openChat();
            renderBotMessage(window.chatTranslations.chooseRoleFirst);
            scrollToBottom();
            return;
        }

        renderUserMessage(question);
        chatInput.value = '';
        scrollToBottom();

        const loadingId = 'loading-' + Date.now();
        chatMessages.insertAdjacentHTML(
            'beforeend',
            `
                <div id="${loadingId}" class="flex items-start gap-2.5 md:gap-3 self-start max-w-[94%] md:max-w-[92%]">
                    <img src="${botAvatar}" alt="AI-Sha" class="w-8 h-8 rounded-full object-cover shadow-sm flex-shrink-0 mt-1">
                    <div class="bg-white text-slate-500 px-3.5 py-3 md:px-4 rounded-2xl rounded-tl-md shadow-sm border border-slate-200 text-xs italic">
                        <i class="fas fa-spinner fa-spin mr-1"></i> ${window.chatTranslations.thinking}
                    </div>
                </div>
            `
        );
        scrollToBottom();

        try {
            const finalQuestion = `[Роль: ${selectedRole}] ${question}`;

            const response = await fetch('/chat/ask', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ question: finalQuestion })
            });

            document.getElementById(loadingId)?.remove();

            if (response.status === 429) {
                renderBotMessage(window.chatTranslations.tooManyRequests);
                scrollToBottom();
                return;
            }

            const data = await response.json();
            const answer = data.answer || window.chatTranslations.empty;
            renderBotMessage(answer);
        } catch (error) {
            document.getElementById(loadingId)?.remove();
            renderBotMessage(window.chatTranslations.serverError);
        }

        scrollToBottom();
    };

    chatToggle.addEventListener('click', openChat);
    collapseChat?.addEventListener('click', hideChat);
    closeChat?.addEventListener('click', hideChat);
    window.addEventListener('resize', syncBodyScrollLock);

    roleButtons.forEach((button) => {
        button.addEventListener('click', () => {
            setSelectedRole(button.dataset.role);
            openChat();
        });
    });

    chatSend.addEventListener('click', sendMessage);
    chatInput.addEventListener('keypress', (event) => {
        if (event.key === 'Enter') {
            sendMessage();
        }
    });
});
