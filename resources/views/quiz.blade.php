<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <a type="button" class="text-primary mb-2" href="{{ route('dashboard') }}">
            <i class="fas fa-arrow-left mr-2"></i> {{ __('Quizzes') }}
      </a>

    <div class="card mb-5 mt-3">
      <div class="card-header border-0">
            <h5 class="card-title mb-1 mt-3">{{ $quiz->title }}</h5>
            <p>{{ $quiz->brief }}</p>
      </div>
      <div class="card-body">
            <p class="mb-3">{{ $quiz->description }}</p>
            <div class="row">
                  <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                              <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ __('Question Count') }}</span>
                                    <span>{{ $quiz->questions_count }}</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ __('Participants Number') }}</span>
                                    <span>{{ $quiz->questions_count }}</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ __('Average Point') }}</span>
                                    <span>{{ $quiz->questions_count }}</span>
                              </li>
                        </ul>
                  </div>
                  <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                              <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ __('Started Date') }}</span> 
                                    <span>
                                          {{$quiz->started_at ? $quiz->started_at->format('d/m/Y H:i'):'-'}}
                                    </span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ __('Finished Date') }}</span> 
                                    <span>
                                          {{$quiz->finished_at ? $quiz->finished_at->format('d/m/Y H:i'):'-'}}
                                    </span>
                              </li>
                        </ul>
                  </div>
            </div>
      </div> 
      <div class="card-footer d-flex p-0 text-center bg-white">
            <a href="{{ route('quiz', $quiz->slug) }}" class="btn w-full rounded-0 btn-success">
                  <i class="fas fa-hourglass-start mr-2"></i> {{ __('Start Quiz') }}
            </a>
      </div>
</div>
    
</x-app-layout>
