<x-app-layout>
    <x-slot name="header">{{ __('Quizzes') }}</x-slot>

    
    <div class="row align-items-center mb-4">
            <div class="col">
                  <h3 class="mb-0">{{ __('Quizzes') }}</h3>
            </div>
            <div class="col-6 text-right">
                  <a type="button" class="btn btn-primary mb-0" href="{{ route('quizzes.create') }}">
                        <i class="fas fa-plus mr-2"></i> {{ __('New Quiz') }}
                   </a>
            </div>
      </div>

    <x-session-message />

    <form action="" method="get">
      <div class="row mb-3">
            <div class="col-md-4">
                  <div class="input-group mb-2">
                        <label class="input-group-text" for="status">{{ __('Status') }}</label>
                        <select class="form-select" name="status">
                              <option value="">{{ __('Choose') }}</option>
                              <option value="active"{{ request('status') == 'active' ? 'selected':'' }}>{{ __('Quiz Active') }}</option>
                              <option value="draft"{{ request('status') == 'draft' ? 'selected':'' }}>{{ __('Quiz Draft') }}</option>
                              <option value="passive"{{ request('status') == 'passive' ? 'selected':'' }}>{{ __('Quiz Passive') }}</option>
                        </select>
                      </div>
            </div>
            <div class="col-md-8">
                  <div class="input-group mb-2">
                        <label class="input-group-text" for="q">{{ __('Search') }}</label>
                        <input type="text" class="form-control" name="q" placeholder="{{ __('Search quiz...') }}" value="{{ request('q') }}">
                        <button type="submit" class="btn btn-primary">
                              <i class="fas fa-search mr-2"></i> {{ __('Search') }}
                        </button>
                      </div>
            </div>
            @if (request()->all())
            <div class="col text-right mt--3">
                  <a class="text-danger mb-0" href="{{ route('quizzes.index') }}">
                        <i class="fas fa-times mr-2"></i> {{ __('Clear Filter') }}
                  </a>
                </div>
            @endif
          </div>
    </form>

    <div class="row align-items-start mt-4">
          @if (count($quizzes))
          @foreach($quizzes as $quiz)
          <div class="col-sm-6 col-lg-4">
            <div class="card mb-3">
                  <div class="card-body">
                        <h5 class="card-title mb-1">{{ $quiz->title }}</h5>
                  </div>
                  <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                              <span>{{ __('Question Count') }}</span>
                              <span>{{ $quiz->questions_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                              <span>{{ __('Status') }}</span>
                              @switch($quiz->status)
                                  @case('active')
                                      <span class="badge bg-success">{{ $quiz->status }}</span>
                                      @break
                                  @case('passive')
                                      <span class="badge bg-danger">{{ $quiz->status }}</span>
                                      @break
                                  @default
                                    <span class="badge bg-warning text-dark">{{ $quiz->status }}</span>
                              @endswitch
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                              <span>{{ __('Started Date') }}</span>
                              <span>
                                    {{ $quiz->started_at ? $quiz->started_at->format('d/m/Y H:i'):'-' }}
                              </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                              <span>{{ __('Finished Date') }}</span> 
                              <span>
                                    {{ $quiz->finished_at ? $quiz->finished_at->format('d/m/Y H:i'):'-' }}
                              </span>
                        </li>
                  </ul>
                  <div class="card-footer d-flex p-0 text-center bg-white">
                        <a href="{{ route('questions.index', $quiz->id) }}" class="btn w-full rounded-0 btn-sm btn-primary">
                              <i class="fas fa-question mr-2"></i> {{ __('Questions') }}
                        </a>
                        <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn w-full rounded-0 btn-sm btn-warning">
                              <i class="fas fa-edit mr-2"></i> {{ __('Edit') }}
                        </a>
                        <a onclick="deleteConfirm('{{ route('quizzes.destroy', $quiz->id) }}', 'Quiz')" class="btn w-full rounded-0 btn-sm btn-danger">
                              <i class="fas fa-trash-alt mr-2"></i> {{ __('Remove') }}
                        </a>
                  </div>
            </div>
          </div>
            @endforeach
          @else
              <div class="col-md-12 mt-3 mb-3">
                  <x-alert type="danger" message="{{ __('Quiz Not Found') }}" />
              </div>
          @endif
         
    </div>

    <div class="text-center mt-3 mb-3">
          {{  $quizzes->withQueryString()->links() }}
    </div>

</x-app-layout>