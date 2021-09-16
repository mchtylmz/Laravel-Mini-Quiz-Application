<div class="alert alert-{{ $type }} d-flex align-items-center" role="alert">
    @if ($type == 'danger')
    <i class="fas fa-exclamation-triangle mr-3"></i>
    @elseif ($type == 'success')
    <i class="fas fa-check-circle mr-3"></i>
    @elseif ($type == 'info')
    <i class="fas fa-info-circle mr-3"></i>
    @elseif ($type == 'warning')
    <i class="fas fa-exclamation-circle mr-3"></i>
    @else
    <i class="fas fa-info mr-3"></i>
    @endif
    <span>{{ $message }}</span>
</div>