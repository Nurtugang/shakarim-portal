@props([])

<div {{ $attributes->merge(['class' => 'fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50']) }}>
    <div @click.away="isModalOpen = false" class="w-full max-w-2xl p-6 mx-4 bg-white rounded-lg shadow-xl">
        
        <div class="mt-4">
            <form action="{{ route('offers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <input type="hidden" name="purchase_id" :value="selectedPurchaseId">

                 <div class="space-y-4">
                    <div>
                        <label for="organization" class="block mb-1 font-medium text-gray-700">Организация:</label>
                        <input type="text" id="organization" name="organization" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div>
                        <label for="head" class="block mb-1 font-medium text-gray-700">Руководитель:</label>
                        <input type="text" id="head" name="head" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div>
                        <label for="contact" class="block mb-1 font-medium text-gray-700">Контактные данные:</label>
                        <input type="text" id="contact" name="contact" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                    <div>
                        <label for="file" class="block mb-1 font-medium text-gray-700">Файл предложения (PDF):</label>
                        <input type="file" id="file" name="filename" class="w-full px-3 py-2 border border-gray-300 rounded-md" required>
                    </div>
                </div>

                <div class="mt-6 text-right">
                    <button type="button" @click="show = false" class="px-4 py-2 mr-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        Отмена
                    </button>
                    <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-600 rounded-md hover:bg-blue-700">
                        Отправить заявку
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>