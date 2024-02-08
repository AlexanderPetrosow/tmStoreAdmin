@if (isset($create))
    @if ($create)
        <div class="d-flex justify-content-end">
            {{-- <form method="POST" action="/search"> --}}
                @csrf
                <div class="search-input">
                    <input type="text" name="search" placeholder="Поиск">
                    <button type="submit" class="btn search-button"><i class="ti ti-search"></i></button>
                </div>
            {{-- </form> --}}
            <a href="/{{ $route }}/add">
                <button type="button" class="btn btn-primary  create-button m-auto text-center">
                    Создать<i class="ti ti-plus m-auto pl-1"></i>
                </button>
            </a>
        </div>
    @else
        <a href={{ url()->previous() }}>
            <button type="button" class="btn btn-primary cancel-button m-auto text-center mr-5">
                Отменить<i class="ti ti-ban m-auto"></i>
            </button>
        </a>
        <button type="submit" class="btn btn-primary save-button m-auto text-center">
            Сохранить<i class="ti ti-check m-auto pl-1"></i>
        </button>
    @endif
@endif
