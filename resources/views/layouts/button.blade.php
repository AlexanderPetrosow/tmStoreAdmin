@if ($create)
<button class="btn btn-primary  create-button m-auto text-center">Создать<i
        class="ti ti-plus m-auto pl-1"></i></button>
@else
<button class="btn btn-primary cancel-button m-auto text-center mr-5">
   <a href={{ url()->previous() }}> Отменить<i class="ti ti-ban m-auto"></i></a>
</button>
<button class="btn btn-primary save-button m-auto text-center">Сохранить<i
        class="ti ti-check m-auto pl-1"></i></button>
@endif