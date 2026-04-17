@extends('layouts.app')
@section('title', 'Mes Tâches')
@section('content')

<style>
  .tasks-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:2rem; }
  .tasks-title { font-size:22px; font-weight:600; color:#0F172A; }
  .badge-count { display:inline-flex; align-items:center; background:#4F46E5; color:#fff;
    border-radius:20px; font-size:12px; font-weight:600; padding:2px 10px; margin-left:8px; }
  .btn-primary { display:inline-flex; align-items:center; gap:6px; padding:9px 18px;
    background:#4F46E5; color:#fff; border-radius:8px; font-weight:500; font-size:14px;
    text-decoration:none; border:none; cursor:pointer; transition:all .2s; }
  .btn-primary:hover { background:#3730A3; transform:translateY(-1px); box-shadow:0 4px 12px rgba(79,70,229,.3); }
  .task-card { background:#fff; border-radius:14px; border:1.5px solid #E2E8F0;
    padding:1rem 1.25rem; display:flex; align-items:flex-start; gap:14px;
    margin-bottom:10px; transition:all .2s; }
  .task-card:hover { border-color:#C7D2FE; box-shadow:0 4px 16px rgba(79,70,229,.08); transform:translateY(-1px); }
  .task-card.done { border-color:#A7F3D0; background:#ECFDF5; }
  .task-title { font-size:15px; font-weight:500; color:#1E293B; margin-bottom:4px; }
  .task-title.done { text-decoration:line-through; color:#94A3B8; }
  .task-desc { font-size:13px; color:#64748B; line-height:1.5; }
  .pill { display:inline-flex; padding:3px 9px; border-radius:20px; font-size:11px; font-weight:500; margin-top:6px; }
  .pill-done { background:#ECFDF5; color:#065F46; }
  .pill-todo { background:#FFFBEB; color:#D97706; }
  .task-actions { display:flex; gap:6px; flex-shrink:0; align-items:center; }
  .btn-ghost { padding:6px 12px; background:transparent; border:1.5px solid #E2E8F0;
    border-radius:8px; font-size:13px; font-weight:500; color:#475569; cursor:pointer;
    text-decoration:none; transition:all .2s; display:inline-flex; align-items:center; }
  .btn-ghost:hover { background:#F1F5F9; color:#1E293B; }
  .btn-danger { padding:6px 10px; background:#FFF1F2; border:1.5px solid #FECDD3;
    border-radius:8px; font-size:13px; color:#E11D48; cursor:pointer; transition:all .2s;
    display:inline-flex; align-items:center; }
  .btn-danger:hover { background:#FFE4E6; }
  .task-status { width:22px; height:22px; border-radius:50%; flex-shrink:0; margin-top:2px;
    display:flex; align-items:center; justify-content:center; color:#fff;
    font-size:12px; font-weight:700; }
  .task-status.pending { border:2px solid #CBD5E1; background:transparent; }
  .task-status.completed { border:2px solid #059669; background:#059669; }
  .empty-state { text-align:center; padding:3rem; color:#94A3B8; }
</style>

<div class="tasks-header">
  <div>
    <span class="tasks-title">
      Mes Tâches
      <span class="badge-count">{{ $tasks->count() }}</span>
    </span>
    <div style="font-size:13px;color:#94A3B8;margin-top:4px">
      {{ $tasks->where('completed', true)->count() }} terminées ·
      {{ $tasks->where('completed', false)->count() }} en cours
    </div>
  </div>
  <a href="{{ route('tasks.create') }}" class="btn-primary">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
      <path d="M12 5v14M5 12h14"/>
    </svg>
    Nouvelle tâche
  </a>
</div>

@forelse($tasks as $task)
  @php
    $isCompleted  = $task->completed;
    $statusClass  = $isCompleted ? 'completed' : 'pending';
    $cardClass    = $isCompleted ? 'done' : '';
    $titleClass   = $isCompleted ? 'done' : '';
    $pillClass    = $isCompleted ? 'pill-done' : 'pill-todo';
    $pillLabel    = $isCompleted ? 'Terminée' : 'En cours';
  @endphp

  <div class="task-card {{ $cardClass }}">

    <div class="task-status {{ $statusClass }}">
      @if($isCompleted) ✓ @endif
    </div>

    <div style="flex:1;min-width:0;">
      <div class="task-title {{ $titleClass }}">{{ $task->title }}</div>
      @if($task->description)
        <div class="task-desc">{{ $task->description }}</div>
      @endif
      <span class="pill {{ $pillClass }}">{{ $pillLabel }}</span>
    </div>

    <div class="task-actions">
      <a href="{{ route('tasks.edit', $task) }}" class="btn-ghost">Modifier</a>
      <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline">
        @csrf
        @method('DELETE')
        <button
          class="btn-danger"
          onclick="return confirm('Supprimer cette tâche ?')"
          title="Supprimer">
          <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M3 6h18M19 6l-1 14H6L5 6M10 11v6M14 11v6M9 6V4h6v2"/>
          </svg>
        </button>
      </form>
    </div>

  </div>
@empty
  <div class="empty-state">
    <div style="font-size:48px;margin-bottom:1rem;">📋</div>
    <h3 style="font-size:16px;font-weight:500;color:#475569;margin-bottom:.5rem;">Aucune tâche pour le moment</h3>
    <p style="font-size:14px;">
      <a href="{{ route('tasks.create') }}" style="color:#4F46E5;font-weight:500;">
        Créez votre première tâche →
      </a>
    </p>
  </div>
@endforelse

@endsection