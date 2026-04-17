@extends('layouts.app')
@section('title', 'Nouvelle Tâche')
@section('content')

<style>
  .form-card { background:#fff; border-radius:16px; border:1.5px solid #E2E8F0; overflow:hidden; max-width:600px; margin:0 auto; box-shadow:0 1px 3px rgba(0,0,0,.06); }
  .form-header { background:linear-gradient(135deg,#4F46E5 0%,#6D28D9 100%); padding:1.5rem 1.75rem; display:flex; align-items:center; gap:14px; }
  .form-header-icon { width:40px; height:40px; background:rgba(255,255,255,.2); border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:20px; }
  .form-header h1 { color:#fff; font-size:18px; font-weight:600; }
  .form-header p { color:rgba(255,255,255,.75); font-size:13px; margin-top:2px; }
  .form-body { padding:1.75rem; }
  .form-group { margin-bottom:1.25rem; }
  .form-label { display:block; font-size:13px; font-weight:500; color:#475569; margin-bottom:6px; }
  .req { color:#E11D48; margin-left:2px; }
  .form-control { width:100%; padding:10px 14px; border:1.5px solid #E2E8F0; border-radius:8px;
    font-size:14px; color:#1E293B; background:#fff; transition:border-color .2s, box-shadow .2s; outline:none; font-family:inherit; }
  .form-control:focus { border-color:#4F46E5; box-shadow:0 0 0 3px rgba(79,70,229,.12); }
  .form-control.is-invalid { border-color:#E11D48; }
  .invalid-feedback { margin-top:5px; font-size:12px; color:#E11D48; }
  textarea.form-control { min-height:110px; resize:vertical; line-height:1.6; }
  .form-actions { display:flex; gap:10px; margin-top:1.5rem; padding-top:1.25rem; border-top:1px solid #F1F5F9; }
  .btn-success { display:inline-flex; align-items:center; gap:6px; padding:9px 20px;
    background:#059669; color:#fff; border:none; border-radius:8px; font-size:14px; font-weight:500; cursor:pointer; transition:all .2s; }
  .btn-success:hover { background:#065F46; transform:translateY(-1px); box-shadow:0 4px 12px rgba(5,150,105,.3); }
  .btn-ghost { display:inline-flex; align-items:center; padding:9px 18px;
    background:transparent; color:#475569; border:1.5px solid #E2E8F0; border-radius:8px;
    font-size:14px; font-weight:500; text-decoration:none; cursor:pointer; transition:all .2s; }
  .btn-ghost:hover { background:#F1F5F9; color:#1E293B; }
</style>

<div class="form-card">
  <div class="form-header">
    <div class="form-header-icon">✦</div>
    <div>
      <h1>Nouvelle tâche</h1>
      <p>Ajoutez une tâche à votre liste de travail</p>
    </div>
  </div>
  <div class="form-body">
    <form action="{{ route('tasks.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label class="form-label">Titre <span class="req">*</span></label>
        <input type="text" name="title"
          class="form-control @error('title') is-invalid @enderror"
          value="{{ old('title') }}"
          placeholder="Ex : Configurer l'authentification Laravel…">
        @error('title')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-group">
        <label class="form-label">
          Description
          <span style="font-weight:400;color:#94A3B8">(optionnelle)</span>
        </label>
        <textarea name="description" class="form-control"
          placeholder="Décrivez ce que vous devez accomplir…">{{ old('description') }}</textarea>
      </div>
      <div class="form-actions">
        <button type="submit" class="btn-success">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 13l4 4L19 7"/></svg>
          Enregistrer
        </button>
        <a href="{{ route('tasks.index') }}" class="btn-ghost">Annuler</a>
      </div>
    </form>
  </div>
</div>

@endsection