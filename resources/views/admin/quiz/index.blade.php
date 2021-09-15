<x-app-layout>
    <x-slot name="header">{{ __('Quizzes') }}</x-slot>

    <a type="button" class="btn btn-primary mb-3" href="{{ route('quizzes.create') }}">
         <i class="fas fa-plus"></i> {{ __('New Quiz') }}
    </a>

    @if (session('success'))
    <x-alert type="success" message="{{ session('success') }}" />
    @endif

    <div class="row align-items-start">
          @if ($quizzes)
          @foreach($quizzes as $quiz)
          <div class="col-sm-6 col-lg-4">
            <div class="card mb-3">
                  <div class="card-body">
                        <h5 class="card-title mb-3">{{ $quiz->title }}</h5>
                  </div>
                  <ul class="list-group list-group-flush">
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
                        <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn w-full rounded-0 btn-sm btn-warning">
                              <i class="fas fa-edit mr-2"></i> {{ __('Edit') }}
                        </a>
                        <a onclick="deleteQuiz('{{ route('quizzes.destroy', $quiz->id) }}', '{{ $quiz->id }}')" class="btn w-full rounded-0 btn-sm btn-danger">
                              <i class="fas fa-trash-alt mr-2"></i> {{ __('Remove') }}
                        </a>
                  </div>
            </div>
          </div>
            @endforeach
          @else
              <div class="col-md-12 mt-3 mb-3">
                  <div class="alert alert-danger" role="alert">
                        {{ __('Quiz Not Found') }}
                  </div>
              </div>
          @endif
         
    </div>

    <div class="text-center mt-3 mb-3">
          {{  $quizzes->links() }}
    </div>

    <x-slot name="script">
      <script>
             function deleteQuiz(route, id) {
                  swal.fire({
                        title: 'Siliniyor',
                        text: 'Quiz Siliniyor, onaylıyor musun?',
                        icon: 'question',
                        showCancelButton: true,
                        showCloseButton: true,
                        buttonsStyling: false,
                        confirmButtonClass: 'btn btn-danger',
                        confirmButtonText: 'Sil',
                        cancelButtonText: 'Vazgeç',
                        cancelButtonClass: 'btn btn-secondary'
                  }).then((result) => {
                        if (result.value) {
                              $.ajax({
                                    type:'DELETE',
                                    url: route,
                                    data: {
                                          _token: '{{ csrf_token() }}'
                                    },
                                    dataType: "json",
                                    success:function(data, status) {
                                          Swal.fire({
                                                icon: 'success',
                                                title: 'Başarılı',
                                                timer: 2000
                                          }).then((result) => {
                                                location.reload();
                                          });
                                    },
                                    error:function(data, status) {
                                          Swal.fire({
                                                icon: 'error',
                                                title: 'Başarısız',
                                                timer: 2000
                                          });
                                    }
                              });
                        } // result value
                  })
             }
      </script>
</x-slot>

</x-app-layout>