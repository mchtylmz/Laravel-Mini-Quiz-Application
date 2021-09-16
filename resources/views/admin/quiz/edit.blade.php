<x-app-layout>
      <x-slot name="header">{{ __('Update Quiz') }}</x-slot>
      
      @if ($errors->any())
          @foreach ($errors->all() as $error)
          <x-alert type="danger" message="{{ $error }}" />
          @endforeach
      @endif

      <form action="{{ route('quizzes.update', $quiz->id) }}" method="post">
            @method('PUT')
            @csrf

            <div class="form-group mb-3">
                  <label for="title" class="form-label">{{ __('Quiz Title') }}</label>
                  <input type="title" class="form-control" id="title" minlength="10" maxlength="200" name="title" placeholder="{{ __('Quiz Title') }}" value="{{ old('title') ?? $quiz->title }}" required>
            </div>

            <div class="form-group mb-3">
                  <label for="desc" class="form-label">{{ __('Quiz Description') }}</label>
                  <textarea class="form-control" id="desc" rows="10" name="description">{{ old('description') ?? $quiz->description }}</textarea>
            </div>

            <div class="row">
                  <div class="col-sm-6">
                        <div class="form-group mb-3">
                              <label for="edate" class="form-label">{{ __('Quiz is Started') }}</label>
                              <select class="form-select" id="isStarted">
                                    <option value="0">{{ __('Now') }}</option>
                                    <option value="1"{{ (old('started_at') ?? $quiz->started_at) ? 'selected':'' }}>{{ __('Choose Date') }}</option>
                              </select>
                        </div>
                  </div>
                  <div class="col-sm-6">
                        <div class="form-group mb-3">
                              <label for="sdate" class="form-label">{{ __('Quiz Started') }}</label>
                              <input type="datetime-local" class="form-control" id="sdate" name="started_at" value="{{ old('started_at') ?? ($quiz->started_at ? date('Y-m-d\TH:i', strtotime($quiz->started_at)):'') }}" {{ (old('started_at') ?? $quiz->started_at) ? '' : 'readonly required' }}>
                        </div>
                  </div>
            </div>

            <div class="row">
                  <div class="col-sm-6">
                        <div class="form-group mb-3">
                              <label for="edate" class="form-label">{{ __('Quiz is Finished Date') }}</label>
                              <select class="form-select" id="isFinished">
                                    <option value="0">{{ __('No') }}</option>
                                    <option value="1"{{ (old('finished_at') ?? $quiz->finished_at) ? 'selected':'' }}>{{ __('Choose Date') }}</option>
                              </select>
                        </div>
                  </div>
                  <div class="col-sm-6">
                        <div class="form-group mb-3">
                              <label for="edate" class="form-label">{{ __('Quiz Finished date') }}</label>
                              <input type="datetime-local" class="form-control" id="edate" name="finished_at" value="{{ old('finished_at') ?? ($quiz->finished_at ? date('Y-m-d\TH:i', strtotime($quiz->finished_at)):'')}}" {{ (old('finished_at') ?? $quiz->finished_at) ? '' : 'readonly required' }}>
                        </div>
                  </div>
            </div>

            <div class="form-group mb-3">
                  <label for="edate" class="form-label">{{ __('Quiz Status') }}</label>
                  <select class="form-select" name="status" required>
                        <option value="">{{ __('Choose') }}</option>
                        <option value="active"{{ (old('status') ?? $quiz->status) == 'active' ? 'selected':'' }}>{{ __('Quiz Active') }}</option>
                        <option value="draft"{{ (old('status') ?? $quiz->status) == 'draft' ? 'selected':'' }}>{{ __('Quiz Draft') }}</option>
                        <option value="passive"{{ (old('passivez') ?? $quiz->status) == 'passive' ? 'selected':'' }}>{{ __('Quiz Passive') }}</option>
                  </select>
            </div>

            <div class="d-grid gap-2 mt-3">
                  <button class="btn btn-primary ld-over-inverse" type="submit">
                        <i class="fas fa-save mr-3"></i> 
                        {{ __('Edit Quiz') }}
                        <i class="fas fa-spinner fa-pulse ld"></i> 
                   </button>
            </div>
      </form>

  </x-app-layout>