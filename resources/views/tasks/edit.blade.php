@extends('layouts.app')
@section('title', 'Modifier la Tâche')
@section('content')

<style>
  /* (reprendre le même .form-card, .form-body, .form-control, .btn-success, .btn-ghost
     que dans create.blade.php — mettez-les dans un fichier CSS partagé ou dans layouts.app) */
  .form-header { background:linear-gradient(135deg,#0F766E 0%,#0D9488 100%); padding:1.5rem 1.75rem; display:flex; align-items:center; gap:14px; }
  .toggle-row { display:flex; align-items:center; gap:14px; padding:12px 14px; background:#F8FAFC; border-radius:8px; border:1.5px solid #E2E8F0; }
  .toggle { position:relative; width:42px; height:24px; flex-shrink:0; }
  .toggle input { opacity:0; width:0; height:0; }
  .toggle-slider { position:absolute; inset:0; background:#CBD5E1; border-radius:12px; cursor:pointer; transition:.3s; }
  .toggle-slider:before { content:''; position:absolute; width:18px; height:18px; left:3px; top:3px; background:#fff; border-radius:50%; transition:.3s; box-shadow:0 1px 3px rgba(0,0,0,.2); }
  .toggle input:checked + .toggle-slider { background:#059669; }
  .toggle input:checked + .toggle-slider:before { transform:translateX(18px); }
  .toggle-label { font-size:14px; font-weight:500; color:#334155; }
  .toggle-sub { font-size:12px; color:#94A3B8; margin-top:2px; }
</style>

<div class="form-card" style="max-width:600px;margin:0 auto;background:#fff;border-radius:16px;border:1.5px solid #E2E8F0;overflow:hidden;box-shadow:0 1px 3px rgba(0,0,0,.06);">
  <div class="form-header">
    <div style="width:40px;height:40px;background:rgba(255,255,255,.2);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:20px;">✎</div>
    <div>
      <h1 style="color:#fff;font-size:18px;font-weight:600;">Modifier la tâche</h1>
      <p style="color:rgba(255,255,255,.75);font-size:13px;margin-top:2px;">Mettez à jour les informations</p>
    </div>
  </div>
  <div style="padding:1.75rem;">
    <form action="{{ route('tasks.update', $task) }}" method="POST">
      @csrf @method('PUT')

      <div style="margin-bottom:1.25rem;">
        <label style="display:block;font-size:13px;font-weight:500;color:#475569;margin-bottom:6px;">
          Titre <span style="color:#E11D48">*</span>
        </label>
        <input type="text" name="title"
          class="form-control @error('title') is-invalid @enderror"
          style="width:100%;padding:10px 14px;border:1.5px solid #E2E8F0;border-radius:8px;font-size:14px;color:#1E293B;outline:none;font-family:inherit;"
          value="{{ old('title', $task->title) }}">
        @error('title')
          <div style="margin-top:5px;font-size:12px;color:#E11D48;">{{ $message }}</div>
        @enderror
      </div>

      <div style="margin-bottom:1.25rem;">
        <label style="display:block;font-size:13px;font-weight:500;color:#475569;margin-bottom:6px;">Description</label>
        <textarea name="description"
          style="width:100%;padding:10px 14px;border:1.5px solid #E2E8F0;border-radius:8px;font-size:14px;color:#1E293B;min-height:110px;resize:vertical;outline:none;font-family:inherit;line-height:1.6;">{{ old('description', $task->description) }}</textarea>
      </div>

      <div style="margin-bottom:1.25rem;">
        <div class="toggle-row">
          <label class="toggle">
            <input type="checkbox" name="completed" {{ $task->completed ? 'checked' : '' }}>
            <span class="toggle-slider"></span>
          </label>
          <div>
            <div class="toggle-label">Marquer comme terminée</div>
            <div class="toggle-sub">{{ $task->completed ? 'Cette tâche est actuellement terminée' : 'Cette tâche est en cours' }}</div>
          </div>
        </div>
      </div>

      <div style="display:flex;gap:10px;margin-top:1.5rem;padding-top:1.25rem;border-top:1px solid #F1F5F9;">
        <button type="submit" class="btn-success">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 13l4 4L19 7"/></svg>
          Mettre à jour
        </button>
        <a href="{{ route('tasks.index') }}" class="btn-ghost">Annuler</a>
      </div>
    </form>
  </div>
</div>

@endsection