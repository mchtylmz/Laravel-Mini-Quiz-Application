<x-app-layout>
      <x-slot name="header">{{ __('New Question') }}</x-slot>
      
      <a type="button" class="text-primary mb-2" href="{{ route('questions.index', $quiz->id) }}">
            <i class="fas fa-arrow-left mr-2"></i> {{ __('Questions') }}
      </a>

      <div class="row align-items-center mb-3">
            <div class="col">
                  <h3 class="mb-0">{{ __('Quiz') }} : {{ $quiz->title }}</h3>
            </div>
      </div>

      @if ($errors->any())
          @foreach ($errors->all() as $error)
          <x-alert type="danger" message="{{ $error }}" />
          @endforeach
      @endif

      <form action="{{ route('questions.store', $quiz->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                  <label for="title" class="form-label">{{ __('Question Title') }}</label>
                  <textarea class="form-control" id="title" rows="2" name="title">{{ old('title') }}</textarea>
            </div>

            <div class="form-group mb-3">
                  <label for="title" class="form-label">{{ __('Question Photo') }}</label>
                  <input type="file" name="image" id="image" accept=".jpg,.png,.gif" class="form-control">
            </div>
            
            <div class="row">
                  <div class="col-sm-6">
                        <div class="form-group mb-3">
                              <label for="title" class="form-label">{{ __('Answer 1') }}</label>
                              <textarea class="form-control" id="answer1" rows="2" name="answer1">{{ old('answer1') }}</textarea>
                        </div>
                  </div>
                  <div class="col-sm-6">
                        <div class="form-group mb-3">
                              <label for="title" class="form-label">{{ __('Answer 2') }}</label>
                              <textarea class="form-control" id="answer2" rows="2" name="answer2">{{ old('answer2') }}</textarea>
                        </div>
                  </div>
                  <div class="col-sm-6">
                        <div class="form-group mb-3">
                              <label for="title" class="form-label">{{ __('Answer 3') }}</label>
                              <textarea class="form-control" id="answer3" rows="2" name="answer3">{{ old('answer3') }}</textarea>
                        </div>
                  </div>
                  <div class="col-sm-6">
                        <div class="form-group mb-3">
                              <label for="title" class="form-label">{{ __('Answer 4') }}</label>
                              <textarea class="form-control" id="answer4" rows="2" name="answer4">{{ old('answer4') }}</textarea>
                        </div>
                  </div>
            </div>

            <div class="form-group mb-3">
                  <label for="edate" class="form-label">{{ __('Correct Answer') }}</label>
                  <select class="form-select" id="correct" name="correct" required>
                        <option value="">{{ __('Choose Answer') }}</option>
                        <option value="answer1"{{ old('correct') == 'answer1' ? 'selected':'' }}>{{ __('Answer 1') }}</option>
                        <option value="answer2"{{ old('correct') == 'answer2' ? 'selected':'' }}>{{ __('Answer 2') }}</option>
                        <option value="answer"{{ old('correct') == 'answer3' ? 'selected':'' }}>{{ __('Answer 3') }}</option>
                        <option value="answer4"{{ old('correct') == 'answer4' ? 'selected':'' }}>{{ __('Answer 4') }}</option>
                  </select>
            </div>

            <div class="d-grid gap-2">
                  <button class="btn btn-primary ld-over-inverse" type="submit">
                       <i class="fas fa-save mr-3"></i> 
                       {{ __('Create Question') }}
                       <i class="fas fa-spinner fa-pulse ld"></i> 
                  </button>
            </div>
      </form>
  </x-app-layout>