<x-app-layout>
    <x-slot name="header">DETAIL: {{ $exam->title }} </x-slot>
    <div class="card">
        <div class="card-body">
            <p class="card-text">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($exam->finished_at)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Son Katılım Tarihi: <span title="{{ $exam->finished_at }}"
                                    class="badge badge-socondary badge-pill"
                                    style="color:red;">{{ $exam->finished_at->diffForHumans() }}</span>
                            </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Soru Sayısı: <span class="badge badge-socondary badge-pill"
                                style="color:red;">{{ $exam->questions_count }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Katılımcı Sayısı: <span class="badge badge-socondary badge-pill"
                                style="color:red;">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Ortalama Puan: <span class="badge badge-socondary badge-pill" style="color:red;">2</span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    {{$exam->description}}
                    <a href="{{ route('exam.join', $exam->slug) }}" class="btn btn-primary btn-block btn-sm"
                        style="width: 100%;">Join to Exam</a>
                </div>
            </div>
            </p>
        </div>
    </div>
</x-app-layout>