<x-app-layout>
    <x-slot name="header">EDIT EXAM</x-slot>
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('exams.update',$exam->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label>EXAM TITLE</label>
                    <input type="text" name="title" class="form-control" value="{{ $exam->title }}">
                </div>
                <div class="form-group">
                    <label>EXAM DESCRIPTION</label>
                    <textarea name="description" class="form-control"rows="4">{{ $exam->description }}</textarea>
                </div>
                <div class="form-group">
                    <input id="isFinished" @if ($exam->finished_at) checked @endif type="checkbox" >
                    <label>Add exam end date?</label>
                </div>
                <div id="finished_input" @if (!$exam->finished_at) style="display:none" @endif class="form-group" >
                    <label>EXAM END DATE</label>
                    <input type="datetime-local" name="finished_at" value="{{ $exam-> finished_at }}" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-sm btn-block">EXAM UPDATE</button>
                </div>
            </form>
        </div>
    </div>
    <x-slot name="js">
        <script type="module">
            $('#isFinished').change(function () {
                if ($('#isFinished').is(':checked')) {
                    $('#finished_input').show();
                } else {
                    $('#finished_input').hide();
                }
            })
        </script>
    </x-slot>
</x-app-layout>