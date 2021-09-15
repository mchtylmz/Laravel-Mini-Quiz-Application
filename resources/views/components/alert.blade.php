<div class="alert alert-{{ $type }} d-flex align-items-center" role="alert">
    @if ($type == 'danger')
    <i class="fas fa-exclamation-circle mr-3"></i>
    @endif
    @if ($type == 'success')
    <i class="fas fa-check-circle mr-3"></i>
    @endif
    <span>{{ $message }}</span>
</div>