<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>The Daybook</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

:root {
    --bg: #070914;
    --bg2: #0d1020;
    --card: rgba(17, 22, 42, 0.78);

    --text: #f4f7ff;
    --muted: #9ba5c4;

    --cyan: #35e7ff;
    --purple: #9b6cff;
    --pink: #ff4fd8;
    --green: #4dff9a;
    --yellow: #ffd85a;
    --red: #ff5c7a;

    --border: rgba(130, 150, 255, 0.16);

    --cyan-glow:
        0 0 10px rgba(53, 231, 255, 0.7),
        0 0 30px rgba(53, 231, 255, 0.25);

    --purple-glow:
        0 0 10px rgba(155, 108, 255, 0.7),
        0 0 30px rgba(155, 108, 255, 0.25);

    --radius: 18px;
}


/* =========================
   GLOBAL
========================= */

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}

html {
    scroll-behavior: smooth;
}

body {
    min-height: 100vh;
    font-family: "Inter", Arial, sans-serif;
    color: var(--text);

    background:
        radial-gradient(
            circle at 10% 10%,
            rgba(53, 231, 255, 0.12),
            transparent 28%
        ),

        radial-gradient(
            circle at 90% 10%,
            rgba(155, 108, 255, 0.15),
            transparent 30%
        ),

        radial-gradient(
            circle at 50% 100%,
            rgba(255, 79, 216, 0.08),
            transparent 35%
        ),

        var(--bg);

    overflow-x: hidden;
}


/* Background grid */

body::before {
    content: "";

    position: fixed;

    inset: 0;

    pointer-events: none;

    background-image:
        linear-gradient(
            rgba(255, 255, 255, 0.018) 1px,
            transparent 1px
        ),

        linear-gradient(
            90deg,
            rgba(255, 255, 255, 0.018) 1px,
            transparent 1px
        );

    background-size: 40px 40px;

    mask-image:
        linear-gradient(
            to bottom,
            black,
            transparent 90%
        );
}


/* =========================
   NAVIGATION
========================= */

.navbar {
    position: sticky;
    top: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 6%;
    background: rgba(7, 9, 20, 0.78);
    border-bottom: 1px solid var(--border);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
}

.logo {
    color: white;
    text-decoration: none;
    font-size: 1.3rem;
    font-weight: 800;
    letter-spacing: -0.5px;
}

.logo span {
    color: var(--cyan);
    text-shadow: var(--cyan-glow);
}

.nav-links {
    display: flex;
    gap: 8px;
    list-style: none;
}

.nav-links a {
    display: block;
    color: var(--muted);
    text-decoration: none;
    padding: 10px 15px;
    border-radius: 10px;
    transition: 0.25s ease;
}

.nav-links a:hover,
.nav-links a.active {
    color: white;
    background: rgba(53, 231, 255, 0.08);
    border: 1px solid rgba(53, 231, 255, 0.15);
    box-shadow: var(--cyan-glow);
    text-shadow: 0 0 10px rgba(53, 231, 255, 0.6);
}


/* =========================
   MAIN CONTAINER
========================= */

.container {
    width: min(1180px, 92%);
    margin: auto;
    padding: 45px 0 70px;
}

.page-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    flex-wrap: wrap;
    margin-bottom: 30px;
}

.page-header h1 {
    font-size: clamp(2rem, 5vw, 3.2rem);
    line-height: 1.1;
    margin-bottom: 10px;
    background:
        linear-gradient(
            90deg,
            #ffffff,
            var(--cyan),
            var(--purple)
        );
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    filter: drop-shadow(
        0 0 15px rgba(53, 231, 255, 0.15)
    );
}

.page-header p {
    color: var(--muted);
    line-height: 1.6;
}


/* =========================
   DASHBOARD
========================= */

.dashboard {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
    margin-bottom: 30px;
}

.stat-card {
    position: relative;
    overflow: hidden;
    padding: 24px;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    background:
        linear-gradient(
            145deg,
            rgba(20, 26, 50, 0.9),
            rgba(10, 13, 28, 0.82)
        );
    box-shadow: 0 15px 45px rgba(0, 0, 0, 0.3);
    transition: 0.3s ease;
}

.stat-card::after {
    content: "";
    position: absolute;
    width: 120px;
    height: 120px;
    right: -60px;
    top: -60px;
    border-radius: 50%;
    background: var(--cyan);
    filter: blur(50px);
    opacity: 0.18;
}

.stat-card:hover {
    transform: translateY(-6px);
    border-color: rgba(53, 231, 255, 0.4);
    box-shadow: var(--cyan-glow);
}

.stat-card .label {
    color: var(--muted);
    font-size: 0.85rem;
}

.stat-card .number {
    display: block;
    margin-top: 8px;
    font-size: 2rem;
    font-weight: 800;
    color: white;
    text-shadow: 0 0 15px rgba(53, 231, 255, 0.25);
}


/* =========================
   TASK GRID
========================= */

.task-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 20px;
}


/* =========================
   TASK CARD
========================= */

.task-card {
    position: relative;
    padding: 22px;
    border: 1px solid var(--border);
    border-radius: var(--radius);
    background: var(--card);
    backdrop-filter: blur(14px);
    -webkit-backdrop-filter: blur(14px);
    box-shadow: 0 12px 40px rgba(0, 0, 0, 0.25);
    transition: 0.3s ease;
}

.task-card:hover {
    transform: translateY(-7px);
    background: rgba(24, 30, 55, 0.92);
    border-color: rgba(155, 108, 255, 0.45);
    box-shadow: var(--purple-glow);
}

.task-card h3 {
    margin-bottom: 9px;
    font-size: 1.1rem;
    color: white;
    display: flex;
    align-items: center;
    gap: 10px;
}

.task-card h3.done {
    text-decoration: line-through;
    color: var(--muted);
}

.task-card p {
    color: var(--muted);
    line-height: 1.65;
    font-size: 0.92rem;
}

.task-meta {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    gap: 9px;
    margin-top: 18px;
}

.task-due {
    color: var(--muted);
    font-size: 0.8rem;
    font-variant-numeric: tabular-nums;
}

.task-actions {
    display: flex;
    gap: 8px;
    margin-top: 14px;
}


/* =========================
   CHECK TOGGLE
========================= */

.check-form {
    margin: 0;
    display: inline-flex;
}

.check-btn {
    width: 1.4rem;
    height: 1.4rem;
    border-radius: 50%;
    border: 1.5px solid var(--muted);
    background: transparent;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    color: transparent;
    transition: 0.2s ease;
}

.check-btn:hover {
    border-color: var(--cyan);
    box-shadow: var(--cyan-glow);
}

.check-btn.done {
    background: var(--green);
    border-color: var(--green);
    color: var(--bg);
    box-shadow: 0 0 10px rgba(77, 255, 154, 0.5);
}

.check-btn svg {
    width: 0.75rem;
    height: 0.75rem;
}


/* =========================
   STATUS
========================= */

.status {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 6px 11px;
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 700;
}

.status::before {
    content: "";
    width: 7px;
    height: 7px;
    border-radius: 50%;
}

.status.pending {
    color: var(--yellow);
    background: rgba(255, 216, 90, 0.09);
    border: 1px solid rgba(255, 216, 90, 0.22);
}

.status.pending::before {
    background: var(--yellow);
    box-shadow: 0 0 10px var(--yellow);
}

.status.completed {
    color: var(--green);
    background: rgba(77, 255, 154, 0.09);
    border: 1px solid rgba(77, 255, 154, 0.22);
}

.status.completed::before {
    background: var(--green);
    box-shadow: 0 0 10px var(--green);
}


/* =========================
   BUTTONS
========================= */

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 11px 17px;
    border: 0;
    border-radius: 11px;
    color: white;
    font-family: inherit;
    font-size: 0.88rem;
    font-weight: 700;
    text-decoration: none;
    cursor: pointer;
    transition: 0.25s ease;
}

.btn-primary {
    background: linear-gradient(135deg, #20d9f5, #7861ff);
    box-shadow: 0 0 18px rgba(53, 231, 255, 0.25);
}

.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow:
        0 0 12px rgba(53, 231, 255, 0.7),
        0 0 35px rgba(53, 231, 255, 0.3);
}

.btn-edit {
    color: #c5adff;
    background: rgba(155, 108, 255, 0.12);
    border: 1px solid rgba(155, 108, 255, 0.3);
    padding: 9px 14px;
    font-size: 0.8rem;
}

.btn-edit:hover {
    color: white;
    background: rgba(155, 108, 255, 0.2);
    box-shadow: var(--purple-glow);
}

.btn-delete {
    color: #ff8299;
    background: rgba(255, 92, 122, 0.09);
    border: 1px solid rgba(255, 92, 122, 0.25);
    padding: 9px 14px;
    font-size: 0.8rem;
}

.btn-delete:hover {
    color: white;
    background: rgba(255, 92, 122, 0.16);
    box-shadow: 0 0 15px rgba(255, 92, 122, 0.5);
}


/* =========================
   FORM
========================= */

.form-card {
    width: min(720px, 100%);
    margin: auto;
    padding: 30px;
    border: 1px solid var(--border);
    border-radius: 22px;
    background: rgba(13, 16, 32, 0.82);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.35);
    backdrop-filter: blur(18px);
    -webkit-backdrop-filter: blur(18px);
}

.form-card h2 {
    margin-bottom: 20px;
    font-size: 1.3rem;
    color: white;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #dce2ff;
    font-size: 0.88rem;
    font-weight: 600;
}

.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 13px 15px;
    color: white;
    background: rgba(4, 7, 17, 0.72);
    border: 1px solid rgba(130, 150, 255, 0.18);
    border-radius: 11px;
    outline: none;
    font-family: inherit;
    transition: 0.25s ease;
}

.form-group input::placeholder,
.form-group textarea::placeholder {
    color: #66708f;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    border-color: var(--cyan);
    box-shadow:
        0 0 0 3px rgba(53, 231, 255, 0.08),
        var(--cyan-glow);
}

.form-group input.invalid,
.form-group textarea.invalid {
    border-color: var(--red);
}

.form-group .error-text {
    margin-top: 8px;
    color: var(--red);
    font-size: 0.8rem;
}

textarea {
    min-height: 100px;
    resize: vertical;
}

.form-actions {
    display: flex;
    align-items: center;
    gap: 18px;
    margin-top: 6px;
}

.form-cancel {
    color: var(--muted);
    background: none;
    border: none;
    font-family: inherit;
    font-size: 0.85rem;
    cursor: pointer;
    padding: 0;
}

.form-cancel:hover {
    color: white;
}


/* =========================
   ALERTS
========================= */

.alert {
    margin-bottom: 20px;
    padding: 14px 17px;
    border-radius: 12px;
    font-size: 0.9rem;
}

.alert-success {
    color: var(--green);
    background: rgba(77, 255, 154, 0.07);
    border: 1px solid rgba(77, 255, 154, 0.2);
    box-shadow: 0 0 20px rgba(77, 255, 154, 0.08);
}

.alert-error {
    color: #ff8299;
    background: rgba(255, 92, 122, 0.07);
    border: 1px solid rgba(255, 92, 122, 0.2);
}


/* =========================
   EMPTY STATE
========================= */

.empty-state {
    text-align: center;
    padding: 60px 20px;
    border: 1px dashed rgba(130, 150, 255, 0.22);
    border-radius: var(--radius);
    color: var(--muted);
    background: rgba(13, 16, 32, 0.35);
}

.empty-state h3 {
    color: white;
    margin-bottom: 8px;
}


/* =========================
   FOOTER
========================= */

.footer {
    padding: 25px 6%;
    text-align: center;
    color: #68728f;
    border-top: 1px solid var(--border);
    background: rgba(5, 7, 15, 0.7);
}

.footer span {
    color: var(--cyan);
    text-shadow: 0 0 10px rgba(53, 231, 255, 0.5);
}


/* =========================
   GLOW ANIMATION
========================= */

@keyframes neonPulse {
    0% { filter: drop-shadow(0 0 5px rgba(53, 231, 255, 0.25)); }
    50% { filter: drop-shadow(0 0 18px rgba(53, 231, 255, 0.5)); }
    100% { filter: drop-shadow(0 0 5px rgba(53, 231, 255, 0.25)); }
}

.logo span {
    animation: neonPulse 2.5s ease-in-out infinite;
}


/* =========================
   MODAL (theme-matched; not part of the supplied sheet)
========================= */

.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(4, 5, 12, 0.72);
    backdrop-filter: blur(4px);
    display: none;
    align-items: center;
    justify-content: center;
    padding: 1.25rem;
    z-index: 2000;
}

.modal-overlay.open {
    display: flex;
}


/* =========================
   MOBILE
========================= */

@media (max-width: 700px) {
    .navbar {
        padding: 15px 4%;
        flex-direction: column;
        align-items: flex-start;
    }

    .nav-links {
        width: 100%;
        overflow-x: auto;
    }

    .container {
        width: 92%;
        padding-top: 30px;
    }

    .dashboard {
        grid-template-columns: 1fr;
    }

    .form-card {
        padding: 22px;
    }

    .page-header h1 {
        font-size: 2.1rem;
    }

    .task-card {
        padding: 18px;
    }

    .btn {
        padding: 10px 14px;
    }
}
    </style>
</head>
<body>

<nav class="navbar">
    <a href="{{ route('tasks.index') }}" class="logo">The <span>Personal Task Manager</span></a>
    <ul class="nav-links">
        <li><a href="{{ route('tasks.index') }}" class="active">Tasks</a></li>
    </ul>
</nav>

<div class="container">

    <div class="page-header">
        <div>
            <h1>Personal Task Manager</h1>
            <p>{{ now()->format('l, F j') }} &middot; keep track of what's pending and what's done.</p>
        </div>
        <button type="button" class="btn btn-primary" onclick="openAddModal()">
            + Add task
        </button>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any() && session('modal') !== 'add')
        <div class="alert alert-error">Please check the highlighted fields and try again.</div>
    @endif

    @if ($errors->any() && session('modal') === 'add')
        <script>window.addEventListener('DOMContentLoaded', () => openAddModal());</script>
    @endif

    <div class="dashboard">
        <div class="stat-card">
            <span class="label">Total tasks</span>
            <span class="number">{{ $tasks->count() }}</span>
        </div>
        <div class="stat-card">
            <span class="label">Pending</span>
            <span class="number">{{ $tasks->where('status', 'Pending')->count() }}</span>
        </div>
        <div class="stat-card">
            <span class="label">Completed</span>
            <span class="number">{{ $tasks->where('status', 'Completed')->count() }}</span>
        </div>
    </div>

    @if ($tasks->count())
        <div class="task-grid">
            @foreach ($tasks as $task)
                <div class="task-card">
                    <h3 class="{{ $task->status === 'Completed' ? 'done' : '' }}">
                        <form method="POST" action="{{ route('tasks.status', $task) }}" class="check-form">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="check-btn {{ $task->status === 'Completed' ? 'done' : '' }}"
                                    aria-label="{{ $task->status === 'Completed' ? 'Mark pending' : 'Mark done' }}">
                                <svg viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 8.5L6.2 11.5L13 4.5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </button>
                        </form>
                        {{ $task->task_name }}
                    </h3>

                    @if ($task->description)
                        <p>{{ $task->description }}</p>
                    @endif

                    <div class="task-meta">
                        <span class="task-due">
                            {{ $task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('M j') : 'No date' }}
                        </span>
                        <span class="status {{ $task->status === 'Completed' ? 'completed' : 'pending' }}">
                            {{ $task->status }}
                        </span>
                    </div>

                    <div class="task-actions">
                        <button type="button" class="btn btn-edit"
                                onclick="openEditModal(
                                    '{{ route('tasks.update', $task) }}',
                                    {{ Illuminate\Support\Js::from($task->task_name) }},
                                    {{ Illuminate\Support\Js::from($task->description) }},
                                    {{ Illuminate\Support\Js::from($task->due_date ? \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') : '') }}
                                )">Edit</button>

                        <form method="POST" action="{{ route('tasks.destroy', $task) }}"
                              onsubmit="return confirm('Delete this entry?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="empty-state">
            <h3>Nothing on the page yet</h3>
            <p>Add your first entry to get started.</p>
        </div>
    @endif

</div>

<footer class="footer">
    <span>The Daybook</span> &mdash; stay on top of it.
</footer>

<!-- Add Entry Modal -->
<div class="modal-overlay" id="add-modal-overlay">
    <div class="form-card">
        <h2>New task</h2>
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf
            <input type="hidden" name="modal_source" value="add">

            <div class="form-group">
                <label for="add_task_name">Task</label>
                <input type="text" id="add_task_name" name="task_name"
                       value="{{ session('modal') === 'add' ? old('task_name') : '' }}"
                       placeholder="What needs doing?"
                       class="@error('task_name') invalid @enderror">
                @error('task_name')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="add_description">Notes (optional)</label>
                <textarea id="add_description" name="description" placeholder="Any details worth noting"
                          class="@error('description') invalid @enderror">{{ session('modal') === 'add' ? old('description') : '' }}</textarea>
                @error('description')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="add_due_date">Due (optional)</label>
                <input type="date" id="add_due_date" name="due_date"
                       value="{{ session('modal') === 'add' ? old('due_date') : '' }}"
                       class="@error('due_date') invalid @enderror">
                @error('due_date')
                    <div class="error-text">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save entry</button>
                <button type="button" class="form-cancel" onclick="closeModal('add-modal-overlay')">Cancel</button>
            </div>
        </form>
    </div>
</div>

<!-- Edit Entry Modal (one shared form, filled in by JS) -->
<div class="modal-overlay" id="edit-modal-overlay">
    <div class="form-card">
        <h2>Edit task</h2>
        <form method="POST" id="edit-form" action="">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="edit_task_name">Task</label>
                <input type="text" id="edit_task_name" name="task_name">
            </div>

            <div class="form-group">
                <label for="edit_description">Notes (optional)</label>
                <textarea id="edit_description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="edit_due_date">Due (optional)</label>
                <input type="date" id="edit_due_date" name="due_date">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">Save changes</button>
                <button type="button" class="form-cancel" onclick="closeModal('edit-modal-overlay')">Cancel</button>
            </div>
        </form>
    </div>
</div>

<script>
    function openAddModal() {
        document.getElementById('add-modal-overlay').classList.add('open');
    }

    function openEditModal(action, name, description, dueDate) {
        const form = document.getElementById('edit-form');
        form.action = action;
        document.getElementById('edit_task_name').value = name || '';
        document.getElementById('edit_description').value = description || '';
        document.getElementById('edit_due_date').value = dueDate || '';
        document.getElementById('edit-modal-overlay').classList.add('open');
    }

    function closeModal(id) {
        document.getElementById(id).classList.remove('open');
    }

    // Close on backdrop click
    document.querySelectorAll('.modal-overlay').forEach(overlay => {
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay) overlay.classList.remove('open');
        });
    });

    // Close on Escape
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.open').forEach(o => o.classList.remove('open'));
        }
    });
</script>
</body>
</html>