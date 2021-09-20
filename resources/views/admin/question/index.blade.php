<x-app-layout>
      <x-slot name="header">{{ __('Questions') }}</x-slot>

      <a type="button" class="text-primary mb-0" href="{{ route('quizzes.index') }}">
            <i class="fas fa-arrow-left mr-2"></i> {{ __('Quizzes') }}
      </a>

      <div class="row align-items-center mb-3">
            <div class="col">
                  <h3 class="mb-3">{{ $quiz->title }}</h3>
            </div>
            <div class="col-sm-4 text-right">
                  <a type="button" class="btn btn-primary mb-3" href="{{ route('questions.create', $quiz->id) }}">
                        <i class="fas fa-plus mr-2"></i> {{ __('New Question') }}
                   </a>
            </div>
      </div>
  
      <x-session-message />

      <form action="" method="get">
            <div class="form-group mb-4">
                  <div class="input-group">
                        <label class="input-group-text" for="q">{{ __('Search') }}</label>
                        <input type="text" class="form-control" name="q" placeholder="{{ __('Search question..') }}" value="{{ request('q') }}">
                        <button type="submit" class="btn btn-primary">
                              <i class="fas fa-search mr-2"></i> {{ __('Search') }}
                        </button>
                      </div>
                      @if (request()->all())
                      <div class="col text-right">
                            <a class="text-danger mb-0" href="{{ route('questions.index', $quiz->id) }}">
                                  <i class="fas fa-times mr-2"></i> {{ __('Clear Filter') }}
                            </a>
                          </div>
                      @endif
            </div>
          </form>

      @if (count($questions))
      @foreach($questions as $key => $question)
      <div class="card mb-3">
            <div class="card-body">
                  <h5 class="card-title mb-1">{{ $question->title }}</h5>
                  @if ($question->image)
                  <a href="{{ asset($question->image) }}" target="_blank" rel="noopener noreferrer">
                        {{ __('Questions Photo View') }}
                  </a>
                  @endif
            </div>
            <div class="row m-0">
                  <div class="col-md-6 m-0 p-0">
                        <ul class="list-group list-group-flush">
                              <li class="list-group-item border">
                                    @if ($question->correct == 'answer1')
                                    <i class="fas fa-check-circle text-success mr-2"></i>     
                                    @endif
                                    {{ $question->answer1 }}
                              </li>
                              <li class="list-group-item border">
                                    @if ($question->correct == 'answer2')
                                    <i class="fas fa-check-circle text-success mr-2"></i>     
                                    @endif
                                    {{ $question->answer2 }}
                              </li>
                        </ul>
                  </div>
                  <div class="col-md-6 m-0 p-0">
                        <ul class="list-group list-group-flush">
                              <li class="list-group-item border">
                                    @if ($question->correct == 'answer3')
                                    <i class="fas fa-check-circle text-success mr-2"></i>     
                                    @endif
                                    {{ $question->answer3 }}
                              </li>
                              <li class="list-group-item border">
                                    @if ($question->correct == 'answer4')
                                    <i class="fas fa-check-circle text-success mr-2"></i>     
                                    @endif
                                    {{ $question->answer4 }}
                              </li>
                        </ul>
                  </div>
            </div>
            <div class="card-footer d-flex p-0 text-center bg-white">
                  <a href="{{ route('questions.edit', [$quiz->id, $question->id]) }}" class="btn w-full rounded-0 btn-sm btn-warning">
                        <i class="fas fa-edit mr-2"></i> {{ __('Edit') }}
                  </a>
                  <a onclick="deleteConfirm('{{ route('questions.destroy', [$quiz->id, $question->id]) }}', 'Question')" class="btn w-full rounded-0 btn-sm btn-danger">
                        <i class="fas fa-trash-alt mr-2"></i> {{ __('Remove') }}
                  </a>
            </div>
      </div>
      @endforeach
    @else
    <x-alert type="danger" message="{{ __('Question Not Found') }}" />
    @endif

    <div class="text-center mt-5 mb-5"wwwwww>
      {{  $questions->withQueryString()->links() }}
</div>

  </x-app-layout>