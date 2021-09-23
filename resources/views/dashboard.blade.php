<x-app-layout>
    <x-slot name="header">{{ __('Dashboard') }}</x-slot>

    
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
                                  <span>{{ __('Finished Date') }}</span> 
                                  <span>
                                        {{$quiz->finished_at ? $quiz->finished_at->format('d/m/Y H:i'):'-'}}
                                  </span>
                            </li>
                      </ul>
                      <div class="card-footer d-flex p-0 text-center bg-white">
                            <a href="{{ route('quiz', $quiz->slug) }}" class="btn w-full rounded-0 btn-sm btn-primary">
                                  <i class="fas fa-hourglass-start mr-2"></i> {{ __('Join Quiz') }}
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
