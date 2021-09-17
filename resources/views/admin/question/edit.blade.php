<x-app-layout>
      <x-slot name="header">{{ __('New Question') }}</x-slot>
      
      <a type="button" class="text-primary mb-2" href="{{ route('questions.store', $question->quiz_id) }}">
            <i class="fas fa-arrow-left mr-2"></i> {{ __('Questions') }}
      </a>

      <div class="row align-items-center mb-3">
            <div class="col">
                  <h3 class="mb-0">{{ __('Question') }} : {{ $question->title }}</h3>
            </div>
      </div>

      @if ($errors->any())
          @foreach ($errors->all() as $error)
          <x-alert type="danger" message="{{ $error }}" />
          @endforeach
      @endif

      <form action="{{ route('questions.update', [$question->quiz_id, $question->id]) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group mb-3">
                  <label for="title" class="form-label">{{ __('Question Title') }}</label>
                  <textarea class="form-control" id="title" rows="2" name="title">{{ old('title') ?? $question->title }}</textarea>
            </div>

            <div class="row align-items-center mt-3 mb-3">
                  <div class="col">
                        @if ($question->image)
                        <a href="{{ asset($question->image) }}" target="_blank" rel="noopener noreferrer">
                              <img src="{{ asset($question->image) }}" class="border w-full" alt="{{ $question->title }}">
                        </a>
                        @endif
                  </div>
                  <div class="col-lg-{{ $question->image ? '10':'12' }}">
                        <div class="form-group mb-3">
                              <label for="title" class="form-label">{{ __('Question Photo') }}</label>
                              <input type="file" name="image" id="image" accept=".jpg,.png,.gif" class="form-control">
                        </div>
                  </div>
            </div>
            
            <div class="row">
                  <div class="col-sm-6">
                        <div class="form-group mb-3">
                              <label for="title" class="form-label">{{ __('Answer 1') }}</label>
                              <textarea class="form-control" id="answer1" rows="2" name="answer1">{{ old('answer1') ?? $question->answer1 }}</textarea>
                        </div>
                  </div>
                  <div class="col-sm-6">
                        <div class="form-group mb-3">
                              <label for="title" class="form-label">{{ __('Answer 2') }}</label>
                              <textarea class="form-control" id="answer2" rows="2" name="answer2">{{ old('answer2') ?? $question->answer2 }}</textarea>
                        </div>
                  </div>
                  <div class="col-sm-6">
                        <div class="form-group mb-3">
                              <label for="title" class="form-label">{{ __('Answer 3') }}</label>
                              <textarea class="form-control" id="answer3" rows="2" name="answer3">{{ old('answer3') ?? $question->answer3 }}</textarea>
                        </div>
                  </div>
                  <div class="col-sm-6">
                        <div class="form-group mb-3">
                              <label for="title" class="form-label">{{ __('Answer 4') }}</label>
                              <textarea class="form-control" id="answer4" rows="2" name="answer4">{{ old('answer4') ?? $question->answer4 }}</textarea>
                        </div>
                  </div>
            </div>

            <div class="form-group mb-3">
                  <label for="edate" class="form-label">{{ __('Correct Answer') }}</label>
                  <select class="form-select" id="correct" name="correct" required>
                        <option value="">{{ __('Choose Answer') }}</option>
                        <option value="answer1"{{ (old('correct') ?? $question->correct) == 'answer1' ? 'selected':'' }}>{{ __('Answer 1') }}</option>
                        <option value="answer2"{{ (old('correct') ?? $question->correct) == 'answer2' ? 'selected':'' }}>{{ __('Answer 2') }}</option>
                        <option value="answer"{{ (old('correct') ?? $question->correct) == 'answer3' ? 'selected':'' }}>{{ __('Answer 3') }}</option>
                        <option value="answer4"{{ (old('correct') ?? $question->correct) == 'answer4' ? 'selected':'' }}>{{ __('Answer 4') }}</option>
                  </select>
            </div>

            <div class="d-grid gap-2">
                  <button class="btn btn-primary ld-over-inverse" type="submit">
                       <i class="fas fa-save mr-3"></i> 
                       {{ __('Edit Question') }}
                       <i class="fas fa-spinner fa-pulse ld"></i> 
                  </button>
            </div>
      </form>
  </x-app-layout>