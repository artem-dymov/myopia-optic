<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Підбір окулярів
        </h2>
    </x-slot>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/additional-methods.min.js"></script>

    <script>
        $(document).ready(function() {
          $("#glasses-selection-form").validate({
            rules: {
              right_eye_diopters: {
                required: true,
                number: true,
                min: -15,
                max: 0,
                step: 0.25
              },
              left_eye_diopters: {
                required: true,
                number: true,
                min: -15,
                max: 0,
                step: 0.25
              },
              pupillary_distance: {
                required: true,
                digits: true,
                min: 40,
                max: 80
              },
              face_shape: {
                required: true
              },
              lifestyle: {
                required: true
              },
              "preferred_frame_materials[]": {
                required: true
              },
              blue_light_sensitivity: {
                required: true
              }
            },
            messages: {
              right_eye_diopters: {
                required: "Введіть діоптрії для правого ока",
                number: "Введіть числове значення",
                min: "Мінімальне значення -15",
                max: "Максимальне значення 0",
                step: "Крок має бути 0.25"
              },
              left_eye_diopters: {
                required: "Введіть діоптрії для лівого ока",
                number: "Введіть числове значення",
                min: "Мінімальне значення -15",
                max: "Максимальне значення 0",
                step: "Крок має бути 0.25"
              },
              pupillary_distance: {
                required: "Введіть відстань між зіницями",
                digits: "Введіть ціле число",
                min: "Мінімальне значення 40 мм",
                max: "Максимальне значення 80 мм"
              },
              face_shape: {
                required: "Оберіть форму обличчя"
              },
              lifestyle: {
                required: "Оберіть стиль життя"
              },
              "preferred_frame_materials[]": {
                required: "Оберіть принаймні один матеріал оправи"
              },
              blue_light_sensitivity: {
                required: "Оберіть чутливість до синього світла"
              }
            },
            errorElement: "span",
            errorClass: "text-red-600 text-sm mt-1 block",
            highlight: function(element) {
              $(element).addClass("border-red-600");
            },
            unhighlight: function(element) {
              $(element).removeClass("border-red-600");
            }
          });
        });
      </script>

  <div class="container mx-auto px-4 md:px-6 py-8 max-w-4xl">
    <div class="bg-white rounded-lg shadow-lg p-6 md:p-8">
      <h1 class="text-3xl font-bold text-gray-900 mb-6">Підбір окулярів при міопії</h1>
      
      <form id="glasses-selection-form" method="post" action="/submit-selection" class="space-y-8" novalidate>
        <!-- Медичні параметри -->
        <fieldset class="border border-gray-300 rounded-md p-4">
          <legend class="text-lg font-semibold text-gray-900 px-2">Медичні параметри</legend>
          
          <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
              <label for="right_eye_diopters" class="block text-gray-700 font-medium mb-1">
                Діоптрії правого ока (міопія, від’ємне число)
              </label>
              <input 
                type="number" step="0.25" min="-15" max="0" 
                id="right_eye_diopters" name="right_eye_diopters" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400"
                placeholder="-1.25"
              />
            </div>
            
            <div>
              <label for="left_eye_diopters" class="block text-gray-700 font-medium mb-1">
                Діоптрії лівого ока (міопія, від’ємне число)
              </label>
              <input 
                type="number" step="0.25" min="-15" max="0" 
                id="left_eye_diopters" name="left_eye_diopters" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400"
                placeholder="-1.50"
              />
            </div>
            
            <div>
              <label for="pupillary_distance" class="block text-gray-700 font-medium mb-1">
                Відстань між зіницями (PD), мм
              </label>
              <input 
                type="number" step="1" min="40" max="80" 
                id="pupillary_distance" name="pupillary_distance" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400"
                placeholder="62"
              />
            </div>
          </div>
        </fieldset>
        
        <!-- Особисті параметри -->
        <fieldset class="border border-gray-300 rounded-md p-4">
          <legend class="text-lg font-semibold text-gray-900 px-2">Особисті параметри</legend>
          
          <div class="mt-4 space-y-6">
            <div>
              <label for="face_shape" class="block text-gray-700 font-medium mb-1">Форма обличчя</label>
              <select 
                id="face_shape" name="face_shape" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400"
              >
                <option value="" disabled selected>-- Оберіть форму --</option>
                <option value="oval">Овальна</option>
                <option value="round">Кругла</option>
                <option value="square">Квадратна</option>
                <option value="diamond">Ромбоподібна</option>
                <option value="triangle">Трикутна</option>
              </select>
            </div>
            
            <div>
              <label for="lifestyle" class="block text-gray-700 font-medium mb-1">Стиль життя</label>
              <select 
                id="lifestyle" name="lifestyle" required
                class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400"
              >
                <option value="" disabled selected>-- Оберіть стиль --</option>
                <option value="active">Активний</option>
                <option value="sedentary">Пасивний</option>
                <option value="mixed">Змішаний</option>
              </select>
            </div>
            
            <div>
              <span class="block text-gray-700 font-medium mb-2">Переваги щодо матеріалу оправи</span>
              <div class="flex flex-wrap gap-4">
                <label class="inline-flex items-center space-x-2">
                  <input type="checkbox" name="preferred_frame_materials[]" value="metal" class="form-checkbox text-gray-700" />
                  <span>Метал</span>
                </label>
                <label class="inline-flex items-center space-x-2">
                  <input type="checkbox" name="preferred_frame_materials[]" value="plastic" class="form-checkbox text-gray-700" />
                  <span>Пластик</span>
                </label>
                <label class="inline-flex items-center space-x-2">
                  <input type="checkbox" name="preferred_frame_materials[]" value="titanium" class="form-checkbox text-gray-700" />
                  <span>Титан</span>
                </label>
              </div>
            </div>
            
            <div>
              <span class="block text-gray-700 font-medium mb-2">Чутливість до синього світла</span>
              <div class="flex items-center space-x-6">
                <label class="inline-flex items-center space-x-2">
                  <input type="radio" name="blue_light_sensitivity" value="1" required class="form-radio text-gray-700" />
                  <span>Так</span>
                </label>
                <label class="inline-flex items-center space-x-2">
                  <input type="radio" name="blue_light_sensitivity" value="0" class="form-radio text-gray-700" />
                  <span>Ні</span>
                </label>
              </div>
            </div>
          </div>
        </fieldset>
        
        <div class="pt-4">
          <button 
            type="submit" 
            class="bg-gray-800 text-white px-6 py-3 rounded-md hover:bg-gray-900 transition-colors w-full md:w-auto"
          >
            Підібрати окуляри
          </button>
        </div>
      </form>
    </div>
  </div>  

  <div id="glasses-results" class="mt-8 p-4 border border-gray-300 rounded-md bg-gray-50 hidden"></div>

  <script>
    $(document).ready(function() {
      $('#glasses-selection-form').on('submit', function(e) {
        e.preventDefault(); // Забороняємо стандартну відправку форми
    
        // Очистити і приховати блок результатів перед новим запитом
        const $results = $('#glasses-results');
        $results.empty().hide();
    
        // Зібрати дані форми
        const formData = $(this).serialize();
    
        $.ajax({
          url: "{{ route('glasses-selection.select') }}", // або '/glasses-selection' якщо без blade
          method: 'POST',
          data: formData,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // якщо CSRF токен потрібен
          },
          success: function(response) {
            // Побудова HTML для виводу результатів
            let html = `<h2 class="text-xl font-semibold mb-4">Результати підбору</h2>`;
    
            html += `<p class="mb-4 italic">${response.summary}</p>`;
    
            // Лінзи
            if(response.recommended_lenses.length > 0) {
              html += `<h3 class="font-semibold mb-2">Рекомендовані лінзи:</h3><ul class="list-disc list-inside mb-4">`;
              response.recommended_lenses.forEach(lens => {
                html += `<li><strong>${lens.name}</strong> - Індекс: ${lens.index}, Матеріал: ${lens.material}, Товщина: ${lens.estimated_thickness_mm} мм, Ціна: ${lens.price} грн</li>`;
              });
              html += `</ul>`;
            } else {
              html += `<p>Лінзи не знайдені за заданими параметрами.</p>`;
            }
    
            // Оправа
            if(response.recommended_frames.length > 0) {
              html += `<h3 class="font-semibold mb-2">Рекомендовані оправи:</h3><ul class="list-disc list-inside">`;
              response.recommended_frames.forEach(frame => {
                html += `<li><strong>${frame.name}</strong> (${frame.shape}) - Матеріал: ${frame.material}, Розміри (Ш×Місток×Дужки): ${frame.width}×${frame.bridge_width}×${frame.temple_length} мм, Колір: ${frame.color}, Ціна: ${frame.price} грн</li>`;
              });
              html += `</ul>`;
            } else {
              html += `<p>Оправа не знайдена за заданими параметрами.</p>`;
            }
    
            // Показати блок з результатами
            $results.html(html).fadeIn();
          },
          error: function(xhr) {
            let errorMsg = 'Сталася помилка при обробці запиту.';
            if(xhr.responseJSON && xhr.responseJSON.errors) {
              errorMsg = '<ul class="list-disc list-inside text-red-600">';
              $.each(xhr.responseJSON.errors, function(key, errors) {
                errors.forEach(error => {
                  errorMsg += `<li>${error}</li>`;
                });
              });
              errorMsg += '</ul>';
            }
            $results.html(errorMsg).fadeIn();
          }
        });
      });
    });
    </script>
    
</x-app-layout>
