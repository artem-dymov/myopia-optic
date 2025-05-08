<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Довідка
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            <div class="container mx-auto px-4 md:px-6 py-8 max-w-4xl">
                <div class="bg-white rounded-lg shadow-lg p-6 md:p-8">
                  <h1 class="text-3xl font-bold text-gray-900 mb-6">Довідкова інформація</h1>
                  
                  <!-- Вхідні параметри -->
                  <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Вхідні параметри</h2>
                    
                    <div class="prose prose-gray">
                      <h3 class="font-medium">Медичні параметри</h3>
                      <ul class="list-disc pl-6 space-y-2">
                        <li><strong>Діоптрії правого/лівого ока</strong> 
                          <p class="text-gray-600">Від’ємні числа з кроком 0.25. Діапазон: від -0.25 до -15.0. Приклад: -1.5, -3.75</p></li>
                        
                        <li><strong>Відстань між зіницями (PD)</strong>
                          <p class="text-gray-600">Ціле число від 40 до 80 мм. Типові значення: 54-68 мм</p></li>
                      </ul>
            
                      <h3 class="font-medium mt-4">Особисті параметри</h3>
                      <ul class="list-disc pl-6 space-y-2">
                        <li><strong>Форма обличчя</strong>
                          <p class="text-gray-600">Доступні варіанти: овальна, кругла, квадратна, ромбоподібна, трикутна</p></li>
                        
                        <li><strong>Стиль життя</strong>
                          <p class="text-gray-600">Вибір зі списку: активний, пасивний, змішаний</p></li>
                        
                        <li><strong>Матеріали оправи</strong>
                          <p class="text-gray-600">Можна обрати кілька варіантів: метал, пластик, титан</p></li>
                        
                        <li><strong>Чутливість до синього світла</strong>
                          <p class="text-gray-600">Так/Ні. Впливає на фільтрацію світла лінзами</p></li>
                      </ul>
                    </div>
                  </section>
            
                  <!-- Вихідні параметри -->
                  <section class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Вихідні параметри</h2>
                    
                    <div class="prose prose-gray">
                      <ul class="list-disc pl-6 space-y-2">
                        <li><strong>Рекомендовані лінзи</strong>
                          <p class="text-gray-600">Містить: назву, індекс заломлення, матеріал, товщину, ціну</p></li>
                        
                        <li><strong>Рекомендовані оправи</strong>
                          <p class="text-gray-600">Містить: назву, форму, матеріал, розміри, колір, ціну</p></li>
                        
                        <li><strong>Додаткова інформація</strong>
                          <p class="text-gray-600">Пояснення рекомендацій та технічні деталі підбору</p></li>
                      </ul>
                    </div>
                  </section>
            
                  <!-- Характеристики -->
                  <section>
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Технічні характеристики</h2>
                    
                    <div class="prose prose-gray">
                      <ul class="list-disc pl-6 space-y-2">
                        <li><strong>Індекс заломлення лінз</strong>
                          <p class="text-gray-600">Варіанти: 1.5 (стандарт), 1.6 (тонші), 1.67 (ультратонкі), 1.74 (професійні)</p></li>
                        
                        <li><strong>Матеріали лінз</strong>
                          <p class="text-gray-600">Пластик (легкі), полікарбонат (міцні), Trivex (оптимальні)</p></li>
                        
                        <li><strong>Розміри оправ</strong>
                          <p class="text-gray-600">Ширина: 120-150мм, місток: 14-24мм, дужки: 135-150мм</p></li>
                      </ul>
                    </div>
                  </section>
                </div>
              </div>
        </div>
    </div>
</x-app-layout>
