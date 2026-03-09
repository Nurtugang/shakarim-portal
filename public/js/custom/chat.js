document.addEventListener('DOMContentLoaded', function() {
    const chatToggle = document.getElementById('chat-toggle');
    const chatWindow = document.getElementById('chat-window');
    const closeChat = document.getElementById('close-chat');
    const chatInput = document.getElementById('chat-input');
    const chatSend = document.getElementById('chat-send');
    const chatMessages = document.getElementById('chat-messages');

    // Открытие/закрытие окна чата
    chatToggle.addEventListener('click', () => {
        chatWindow.classList.toggle('hidden');
        if (!chatWindow.classList.contains('hidden')) chatInput.focus();
    });
    closeChat.addEventListener('click', () => chatWindow.classList.add('hidden'));

    // Функция отправки
    const sendMessage = async () => {
        const question = chatInput.value.trim();
        if (!question) return;

        // Рендер сообщения пользователя
        chatMessages.innerHTML += `
            <div class="bg-shakarim-blue text-white self-end p-3 rounded-lg rounded-tr-none max-w-[85%] shadow-sm">
                ${question}
            </div>`;
        chatInput.value = '';
        chatMessages.scrollTop = chatMessages.scrollHeight;

        // Индикатор загрузки
        const loadingId = 'loading-' + Date.now();
        chatMessages.innerHTML += `
            <div id="${loadingId}" class="bg-gray-200 text-gray-600 self-start p-3 rounded-lg rounded-tl-none text-xs italic">
                <i class="fas fa-spinner fa-spin mr-1"></i> ${window.chatTranslations.thinking}
            </div>`;
        chatMessages.scrollTop = chatMessages.scrollHeight;

        try {
            // Запрос к своему Laravel контроллеру
            const response = await fetch('/chat/ask', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ question: question })
            });

            if (response.status === 429) {
                document.getElementById(loadingId).remove();
                chatMessages.innerHTML += `
                    <div class="bg-yellow-100 text-yellow-900 self-start p-3 rounded-lg rounded-tl-none max-w-[85%] shadow-sm">
                        ${window.chatTranslations.tooManyRequests}
                    </div>`;
                chatMessages.scrollTop = chatMessages.scrollHeight;
                return;
            }

            const data = await response.json();
            document.getElementById(loadingId).remove();

            // Рендер ответа от API
            const answer = data.answer || window.chatTranslations.empty;
            chatMessages.innerHTML += `
                <div class="bg-blue-100 text-blue-900 self-start p-3 rounded-lg rounded-tl-none max-w-[85%] shadow-sm">
                    ${answer}
                </div>`;
        } catch (error) {
            document.getElementById(loadingId).remove();
            chatMessages.innerHTML += `
                <div class="bg-red-100 text-red-900 self-start p-3 rounded-lg rounded-tl-none max-w-[85%] shadow-sm">
                    ${window.chatTranslations.serverError}
                </div>`;
        }
        
        chatMessages.scrollTop = chatMessages.scrollHeight;
    };

    // Обработчики клика и Enter
    chatSend.addEventListener('click', sendMessage);
    chatInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });
});