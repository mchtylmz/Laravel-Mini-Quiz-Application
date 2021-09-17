<x-app-layout>
    <x-slot name="header">{{ __('Quizzes') }}</x-slot>

    
    <div class="row align-items-center mb-3">
            <div class="col-sm-9">
                  <h3 class="mb-0">{{ __('Quizzes') }}</h3>
            </div>
            <div class="col-sm-3 text-right">
                  <a type="button" class="btn btn-primary mb-3" href="{{ route('quizzes.create') }}">
                        <i class="fas fa-plus"></i> {{ __('New Quiz') }}
                   </a>
            </div>
      </div>

    <x-session-message />

    <div class="row align-items-start">
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
                              <span>{{ $quiz->questions()->count() }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                              <span>{{ __('Status') }}</span>
                              <span>{{ $quiz->status }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                              <span>{{ __('Started Date') }}</span>
                              <span>{{ $quiz->started_at }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                              <span>{{ __('Finished Date') }}</span> 
                              <span>{{ $quiz->finished_at }}</span>
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
          {{  $quizzes->links() }}
    </div>

</x-app-layout>