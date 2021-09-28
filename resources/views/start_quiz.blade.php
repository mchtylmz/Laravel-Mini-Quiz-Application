<x-app-layout>
      <x-slot name="header">{{ $quiz->title }}</x-slot>
  
      <div class="card mb-3 mt-3">
        <div class="card-header border-0 bg-white p-3">
            <div class="row align-items-center mb-0">
                  <div class="col">
                  <h5 class="card-title mb-0">{{ $quiz->title }}</h5>
                  </div>
                  <div class="col-sm-2 text-right">
                  <a type="button" class="btn btn-primary btn-sm mb-0"  href="{{ route('quiz', $quiz->slug) }}">
                        <i class="fas fa-arrow-left mr-2"></i> {{ __('Quizzes View') }}
                   </a>
                  </div>
            </div>
        </div>
      </div>

      <form action="{{ route('quiz.save', $quiz->slug) }}" method="post" class="quiz">
      @csrf
      @foreach ($questions as $key => $question)
      <div class="card mb-3 mt-3">
            <div class="card-header border-0 bg-white p-3">
                  <h5 class="card-title mb-0">
                        <span class="badge rounded-pill bg-dark mr-2">
                              {{ $loop->iteration }}
                        </span> {{ $question->title }}
                  </h5>
            </div>
            <div class="row align-items-center">
                  @if ($question->image)
                  <div class="col-sm-3 text-center">
                        <img src="{{ asset($question->image) }}" class="w-full question-image" alt="{{ $question->title }}">
                  </div>    
                  @endif
                  <div class="col">
                        <div class="btn-group-vertical w-full p-3" role="group" id="question{{ $loop->iteration }}">
                              <input type="radio" class="btn-check" name="{{ $question->id }}" value="answer2"
                              id="answer1_{{ $question->id }}" required>
                              <label class="btn btn-outline-success" for="answer1_{{ $question->id }}">
                                    {{ $question->answer1 }}
                              </label>
            
                              <input type="radio" class="btn-check" name="{{ $question->id }}" value="answer2"
                              id="answer2_{{ $question->id }}" required>
                              <label class="btn btn-outline-success" for="answer2_{{ $question->id }}">
                                    {{ $question->answer2 }}
                              </label>
            
                              <input type="radio" class="btn-check" name="{{ $question->id }}" value="answer3"
                              id="answer3_{{ $question->id }}" required>
                              <label class="btn btn-outline-success" for="answer3_{{ $question->id }}">
                                    {{ $question->answer3 }}
                              </label>
            
                              <input type="radio" class="btn-check" name="{{ $question->id }}" value="answer4"
                              id="answer4_{{ $question->id }}" required>
                              <label class="btn btn-outline-success" for="answer4_{{ $question->id }}">
                                    {{ $question->answer4 }}
                              </label>
                        </div>
                  </div>
            </div>
      </div>
      @endforeach

      <div class="card mb-3 mt-3">
            <div class="card-footer border-0 p-0">
                  <button class="btn btn-primary w-full ld-over-inverse" type="submit">
                        <i class="fas fa-save mr-3"></i> 
                        {{ __('Finish Quiz') }}
                        <i class="fas fa-spinner fa-pulse ld"></i> 
                   </button>
            </div>
      </div>

      </form>
      
  </x-app-layout>
  