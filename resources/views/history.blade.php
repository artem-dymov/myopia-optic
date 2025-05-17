<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Історія підбору
        </h2>
    </x-slot>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

    @php
        $parameterLabels = [
            'lifestyle' => 'Стиль життя',
            'face_shape' => 'Форма обличчя',
            'left_eye_diopters' => 'Діоптрії лівого ока',
            'pupillary_distance' => 'Міжзінична відстань',
            'right_eye_diopters' => 'Діоптрії правого ока',
            'blue_light_sensitivity' => 'Чутливість до синього світла',
            'preferred_frame_materials' => 'Обрані матеріали оправи',
        ];
    @endphp


    <div class="container mx-auto px-4 py-6">
      <h1 class="text-3xl font-semibold mb-6">Історія підбору окулярів</h1>
      @forelse($recommendations as $recommendation)
          <div class="bg-white shadow rounded mb-4 border border-gray-200">
              <div class="flex justify-between items-center px-6 py-4 cursor-pointer select-none">
                  <div>
                      <span class="text-gray-500 text-sm">Підбір від:</span>
                      <span class="font-medium text-gray-800">{{ $recommendation->created_at->format('d.m.Y H:i') }}</span>
                  </div>
                  <button class="flex items-center text-blue-600 focus:outline-none toggle-details">
                      <span class="mr-2 toggle-text">Розгорнути</span>
                      <svg class="w-5 h-5 transition-transform duration-300 transform" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                          <polyline points="6 9 12 15 18 9"></polyline>
                      </svg>
                  </button>
              </div>
              <div class="px-6 pb-4 hidden details-content">
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                      <div>
                          <h3 class="font-semibold mb-2 text-lg">Параметри підбору</h3>
                          <ul class="list-disc list-inside text-gray-700">
                            @foreach($recommendation->input_parameters as $key => $value)
                                <li>
                                    <strong>{{ $parameterLabels[$key] ?? ucfirst(str_replace('_', ' ', $key)) }}:</strong>
                                    {{ is_array($value) ? implode(', ', $value) : $value }}
                                </li>
                            @endforeach

                          </ul>
                      </div>
                      <div>
                          <h3 class="font-semibold mb-2 text-lg">Рекомендовані лінзи</h3>
                          @if(!empty($recommendation->recommended_lenses))
                              <ul class="list-disc list-inside text-gray-700 mb-4">
                                  @foreach($recommendation->recommended_lenses as $lens)
                                      <li>{{ $lens['name'] ?? 'Невідома лінза' }} - {{ $lens['price'] ?? 'ціна відсутня' }} грн</li>
                                  @endforeach
                              </ul>
                          @else
                              <p class="text-gray-500">Лінзи не знайдені</p>
                          @endif
  
                          <h3 class="font-semibold mb-2 text-lg">Рекомендовані оправи</h3>
                          @if(!empty($recommendation->recommended_frames))
                              <ul class="list-disc list-inside text-gray-700">
                                  @foreach($recommendation->recommended_frames as $frame)
                                      <li>{{ $frame['name'] ?? 'Невідома оправа' }} - {{ $frame['price'] ?? 'ціна відсутня' }} грн</li>
                                  @endforeach
                              </ul>
                          @else
                              <p class="text-gray-500">Оправи не знайдені</p>
                          @endif
                      </div>
                  </div>
              </div>
          </div>
      @empty
          <p class="text-gray-600">Ваша історія підборів порожня.</p>
      @endforelse
  </div>

  <script>
        $(document).ready(function() {
            $('.toggle-details').click(function() {
                const $card = $(this).closest('div.bg-white');
                const $content = $card.find('.details-content');
                const $icon = $(this).find('svg');
                const $text = $(this).find('.toggle-text');

                $content.slideToggle(300, function() {
                    // Цей код виконається після завершення анімації
                    const isVisible = $content.is(':visible');
                    $icon.toggleClass('rotate-180', isVisible);
                    $text.text(isVisible ? 'Згорнути' : 'Розгорнути');
                });
            });
        });
  </script>
</x-app-layout>
