<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <a type="button" class="text-primary mb-2" href="{{ route('dashboard') }}">
            <i class="fas fa-arrow-left mr-2"></i> {{ __('Quizzes') }}
    </a>

    <x-session-message />
    
    <div class="card mb-3 mt-3">
      <div class="card-header border-0">
            <h5 class="card-title mb-1 mt-2">{{ $quiz->title }}</h5>
      </div>
      <div class="card-body">
            <p class="mb-3">{{ $quiz->description }}</p>
            <div class="row">
                  <div class="col-md-6">
                        <ul class="list-group list-group-flush">
                              <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ __('Question Count') }}</span>
                                    <span>{{ $quiz->questions_count }} {{ __('Question') }}</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ __('Participants Number') }}</span>
                                    <span>{{ $quiz->info->participants }} {{ __('User') }}</span>
                              </li>
                              <li class="list-group-item d-flex justify-content-between">
                                    <span>{{ __('Average Point') }}</span>
                                    <span>{{ $quiz->info->average }} {{ __('Point') }}</span>
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
                              <li class="list-group-item d-flex align-items-center justify-content-between">
                                    <span>{{ __('Finished Date') }}</span> 
                                    <span>
                                          {{$quiz->finished_at ? $quiz->finished_at->format('d/m/Y H:i'):'-'}}
                                          @if ($quiz->finished_at)
                                          - {{ $quiz->finished_at->diffForHumans() }}
                                          @endif
                                    </span>
                              </li>
                        </ul>
                  </div>
            </div>
      </div> 

      @if (!$quiz->myResult)
            <div class="card-footer d-flex p-0 text-center bg-white">
                  @if ($quiz->is_started && !$quiz->is_finished)
                        <a href="{{ route('quiz.start', $quiz->slug) }}" 
                              class="btn w-full rounded-0 btn-success">
                              <i class="fas fa-paper-plane mr-2"></i> {{ __('Start Quiz') }}
                        </a>
                  @elseif (!$quiz->is_started && $quiz->started_at)
                        <a class="btn w-full rounded-0 btn-warning opacity-8" disabled>
                              <i class="fas fa-hourglass-start fa-pulse fa-slow mr-2"></i> 
                              {{ $quiz->started_at->diffForHumans() }}
                        </a>
                  @endif
            </div>
      @endif
</div>

@if ($quiz->myResult)
<div class="card mb-3 mt-3">
      <div class="card-header border-0">
            <h5 class="card-title mb-1 mt-2">{{ __('Quiz Result') }}</h5>
      </div>
      <div class="card-body">
            <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between">
                        <span>{{ __('Total Point') }}</span> 
                        <span class="badge bg-dark">
                              {{ number_format($quiz->myResult->point, 1) }} {{ __('Point') }}
                        </span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                        <span>{{ __('Correct Answer') }}</span> 
                        <span class="badge bg-success">{{ $quiz->myResult->correct }} {{ __('Question') }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                        <span>{{ __('Wrong Answer') }}</span> 
                        <span class="badge bg-danger">{{ $quiz->myResult->wrong }} {{ __('Question') }}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                        <span>{{ __('Quiz Answer Date') }}</span> 
                        <span>{{ $quiz->myResult->updated_at->format('d/m/Y H:i') }}</span>
                  </li>
            </ul>
      </div>
      <div class="card-footer d-flex p-0 text-center bg-white">
            
            
<div class="accordion accordion-flush w-full" id="accordionFlushExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
            Accordion Item #1
          </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
        </div>
      </div>
    </div>

      </div>
</div>
@endif



</x-app-layout>
