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

      

</x-app-layout>
