<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Головна
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Ви авторизовані!
                </div>
            </div>

            <!-- Main Content -->
            <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8 space-y-4">

                <!-- Блок 1: Що таке міопія і важливість підбору окулярів -->
                <section class="bg-white shadow sm:rounded-lg p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Що таке міопія?</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Міопія - це поширене порушення зору, при якому людина добре бачить близько, але погано - на відстані. Важливо правильно підібрати окуляри, щоб покращити якість зору, уникнути перевтоми очей та запобігти подальшому погіршенню зору.
                    </p>
                </section>

                <!-- Блок 2: Підбір окулярів -->
                <section class="bg-white shadow sm:rounded-lg p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Підбір окулярів</h2>
                    <p class="text-gray-700 leading-relaxed">
                        У цьому розділі ви можете заповнити просту форму, вказавши свої параметри зору. Система автоматично підбере для вас рекомендовані оправу та лінзи, які найкраще підходять саме вам.
                    </p>
                </section>

                <!-- Блок 3: Довідка -->
                <section class="bg-white shadow sm:rounded-lg p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Довідка</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Тут ви знайдете корисну інформацію про міопію, способи її корекції, рекомендації щодо догляду за очима та відповіді на поширені питання.
                    </p>
                </section>

                <!-- Блок 4: Історія -->
                <section class="bg-white shadow sm:rounded-lg p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Історія</h2>
                    <p class="text-gray-700 leading-relaxed">
                        У цьому розділі зберігаються результати ваших минулих підборів окулярів. Ви можете переглядати свої попередні рекомендації та швидко повертатися до них у будь-який момент.
                    </p>
                </section>

                <!-- Блок 5: Профіль -->
                <section class="bg-white shadow sm:rounded-lg p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Профіль</h2>
                    <p class="text-gray-700 leading-relaxed">
                        Тут ви можете керувати своїми особистими даними: змінити пароль, електронну пошту, ім'я або видалити свій акаунт. Забезпечуємо безпеку і комфорт у використанні сайту.
                    </p>
                </section>

            </div>

        </div>
    </div>
</x-app-layout>
