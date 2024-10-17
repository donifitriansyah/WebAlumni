@extends('layouts.tracer')

@section('title')
    Tracer Study
@endsection

@section('content-alumni')
<div class="container">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tracer.store') }}" method="POST">
        @csrf

        @foreach($pertanyaan as $item)
            <div class="form-group">
                <label for="jawaban_terbuka[{{ $item->id_pertanyaan }}]">{{ $item->pertanyaan }}</label>

                @if ($item->jenis == 'terbuka')
                    <textarea name="jawaban_terbuka[{{ $item->id_pertanyaan }}]" class="form-control" rows="3" required></textarea>
                    @elseif ($item->jenis == 'skala')
                    @for ($i = 1; $i <= 5; $i++)
                        <br>
                        <input type="radio" name="jawaban_skala[{{ $item->id_pertanyaan }}]" value="{{ $i }}">
                        <label for="skala{{ $i }}">{{ $i }}</label><br>
                    @endfor
                @endif
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection


{{-- <div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Pertanyaan</h6>
        </div>
        <div class="card-body">
            <h1>Form Tracer Study</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tracerstudy.store') }}" method="POST">
                @csrf
                @foreach ($questions as $question)
                    <!-- Tampilkan setiap pertanyaan -->
                    <div class="form-group" id="question-{{ $question->id_pertanyaan }}" style="">
                        <label>{{ $question->pertanyaan }}</label>

                        @if ($question->id_pertanyaan >= 1 && $question->id_pertanyaan <= 4)
                            <!-- Jika pertanyaan ID 1-4, isi otomatis -->
                            @if ($question->id_pertanyaan == 1)
                                <input type="text" class="form-control" name="question_1" id="question_1"
                                    value="{{ $alumni->nama_alumni }}" required>
                            @elseif($question->id_pertanyaan == 2)
                                <input type="text" class="form-control" name="question_2" id="question_2"
                                    value="{{ $alumni->nim }}" required>
                            @elseif($question->id_pertanyaan == 3)
                                <input type="date" class="form-control" name="question_3" id="question_3"
                                    value="{{ $alumni->tanggal_lahir }}" required>
                            @elseif($question->id_pertanyaan == 4)
                                <input type="text" class="form-control" name="question_4" id="question_4"
                                    value="{{ $alumni->alamat }}" required>
                            @endif
                        @elseif($question->id_pertanyaan == 5)
                            <div>
                                <input type="number" class="form-control" name="question_5" id="question_5"
                                    min="1900" max="{{ date('Y') }}" required>
                            </div>
                        @elseif($question->id_pertanyaan == 6)
                            <div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="question_6" id="question_6"
                                        value="Ya" onclick="showAdditionalQuestions(true)">
                                    <label class="form-check-label"
                                        for="question_{{ $question->id_pertanyaan }}_1">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="question_" id="question_2"
                                        value="Tidak" onclick="showAdditionalQuestions(false)">
                                    <label class="form-check-label" for="question_2">Tidak</label>
                                </div>
                            </div>
                        @elseif($question->id_pertanyaan == 7)
                            <div>
                                <select class="form-control" name="question_7" id="question_7"
                                    onchange="showAdditionalQuestions(this.value)">
                                    <option value="" disabled selected>Pilih jawaban...</option>
                                    <option value="Orang Tua">Orang Tua</option>
                                    <option value="Diri Sendiri">Diri Sendiri</option>
                                    <option value="Beasiswa">Beasiswa</option>
                                    <option value="Ditanggung Perusahaan">Ditanggung Perusahaan</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        @elseif($question->id_pertanyaan == 10)
                            <div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="question_10" id="question_10"
                                        value="Bekerja" required onclick="showAdditionalQuestions1(false)">
                                    <label class="form-check-label" for="question_10">Bekerja</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="question_10" id="question_10"
                                        value="Tidak Bekerja" required onclick="showAdditionalQuestions1(true)">
                                    <label class="form-check-label" for="question_10">Tidak Bekerja</label>
                                </div>
                            </div>
                        @elseif($question->id_pertanyaan == 11)
                            <div>
                                <select class="form-control" name="question_11" id="question_11" >
                                    <option value="" disabled selected>Pilih jawaban...</option>
                                    <option value="Melanjutkan pendidikan">Melanjutkan pendidikan</option>
                                    <option value="Sedang Mencari Pekerjaan">Sedang Mencari Pekerjaan</option>
                                    <option value="Alasan Kesehatan">Alasan Kesehatan</option>
                                    <option value="Memilih Tidak Bekerja">Memilih Tidak Bekerja</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        @elseif($question->id_pertanyaan == 14)
                            <div>
                                <select class="form-control" name="question_14" id="question_14">
                                    <option value="" disabled selected>Pilih jawaban...</option>
                                    <option value="Melalui job fair">Melalui job fair</option>
                                    <option value="Melalui teman/kerabat">Melalui teman/kerabat</option>
                                    <option value="Melalui internet/job portal">Melalui internet/job portal</option>
                                    <option value="Melalui magang">Melalui magang</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        @elseif($question->id_pertanyaan == 15)
                            <div>
                                <select class="form-control" name="question_15" id="question_15">
                                    <option value="" disabled selected>Pilih jawaban...</option>
                                    <option value="< 1 Bulan">
                                        < 1 Bulan</option>
                                    <option value="1 - 3 Bulan">1 - 3 Bulan</option>
                                    <option value="3 - 6 Bulan">3 - 6 Bulan</option>
                                    <option value="> 6 Bulan">> 6 Bulan</option>
                                </select>
                            </div>
                        @elseif($question->id_pertanyaan == 16)
                            <div>
                                <select class="form-control" name="question_16" id="question_16">
                                    <option value="" disabled selected>Pilih jawaban...</option>
                                    <option value="Sangat Sesuai">Sangat Sesuai</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Kurang Sesuai">Kurang Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        @elseif($question->id_pertanyaan == 17)
                            <div>
                                <select class="form-control" name="question_17" id="question_17">
                                    <option value="" disabled selected>Pilih jawaban...</option>
                                    <option value="< Rp. 2.000.000">
                                        < Rp. 2.000.000</option>
                                    <option value="Rp. 2.000.000 - Rp. 5.000.000">Rp. 2.000.000 - Rp. 5.000.000
                                    </option>
                                    <option value="Rp. 5.000.000 - Rp. 10.000.000">Rp. 5.000.000 - Rp. 10.000.000
                                    </option>
                                    <option value="> Rp. 10.000.000">> Rp. 10.000.000</option>
                                </select>
                            </div>
                        @elseif($question->id_pertanyaan == 18)
                            <div>
                                <label><input type="checkbox" name="skill[]" value="Pemrograman"> Pemrograman
                                    (misalnya, Java, Python)
                                </label><br>
                                <label><input type="checkbox" name="question_18" value="Pengembangan web">
                                    Pengembangan web (HTML, CSS, JavaScript)</label><br>
                                <label><input type="checkbox" name="question_18" value="Basis data"> Basis data (SQL,
                                    NoSQL)</label><br>
                                <label><input type="checkbox" name="question_18" value="Jaringan komputer"> Jaringan
                                    komputer</label><br>
                                <label><input type="checkbox" name="question_18" value="Keamanan siber"> Keamanan
                                    siber</label><br>
                                <label><input type="checkbox" name="question_18" value="Analisis data"> Analisis
                                    data</label><br>
                                <label><input type="checkbox" name="question_18"
                                        value="Pengembangan aplikasi mobile"> Pengembangan aplikasi mobile</label><br>
                                <label><input type="checkbox" name="question_18" value="Lainnya"> Lainnya: <input
                                        type="text" name="other-skill" placeholder=""></label><br>
                            </div>
                        @elseif($question->id_pertanyaan == 19)
                            <div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="question_19"
                                        id="question_19" value="Ya" onclick="showAdditionalQuestions3(true)">
                                    <label class="form-check-label"
                                        for="question_{{ $question->id_pertanyaan }}_1">Ya</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="question_19"
                                        id="question_19" value="Tidak" onclick="showAdditionalQuestions3(false)">
                                    <label class="form-check-label"
                                        for="question_{{ $question->id_pertanyaan }}_2">Tidak</label>
                                </div>

                                <!-- Input field that is shown when "Ya" is selected -->
                                <div id="additional-input" style="display: none;">
                                    <label for="input-{{ $question->id_pertanyaan }}">Jika Ya, Sebutkan</label>
                                    <input type="text" class="form-control" id="question_19" name="question_19">
                                </div>
                            </div>
                        @elseif($question->id_pertanyaan == 20)
                            <div>
                                <select class="form-control" name="question_20" id="question_20">
                                    <option value="" disabled selected>Pilih jawaban...</option>
                                    <option value="Setiap hari">
                                        Setiap hari</option>
                                    <option value="Beberapa kali seminggu">Beberapa kali seminggu
                                    </option>
                                    <option value="Beberapa kali sebulan">Beberapa kali sebulan
                                    </option>
                                    <option value="Jarang sekali">Jarang sekali</option>
                                </select>
                            </div>
                        @elseif($question->id_pertanyaan >= 8)
                            <!-- Modify for any other question IDs -->
                            <input type="text" class="form-control"
                                name="question_{{ $question->id_pertanyaan }}"
                                id="question_{{ $question->id_pertanyaan }}">
                        @else
                            <input type="text" class="form-control"
                                name="question_{{ $question->id_pertanyaan }}"
                                id="question_{{ $question->id_pertanyaan }}" required>
                        @endif
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
</div>

<script>
    function showAdditionalQuestions(isYes) {
        // Show or hide additional questions based on selection
        const questionsToShow = [7, 8, 9]; // IDs of the questions to show
        questionsToShow.forEach(id => {
            const questionElement = document.getElementById(`question-${id}`);
            if (questionElement) {
                questionElement.style.display = isYes ? 'block' : 'none';
            }
        });
    }

    function showAdditionalQuestions1(isNotWorking) {
        // IDs of the questions to show/hide based on selection
        const questionsToShowIfWorking = [12, 13, 14, 15, 16, 17, 18, 19]; // For "Bekerja"
        const questionToShowIfNotWorking = [11]; // For "Tidak Bekerja"

        // Hide all questions first
        [...questionsToShowIfWorking, ...questionToShowIfNotWorking].forEach(id => {
            const questionElement = document.getElementById(`question-${id}`);
            if (questionElement) {
                questionElement.style.display = 'none';
            }
        });

        // Show specific questions based on the selection
        if (isNotWorking) {
            // Show question 11 if "Tidak Bekerja" is selected
            const questionElement = document.getElementById(`question-11`);
            if (questionElement) {
                questionElement.style.display = 'block';
            }
        } else {
            // Show questions 12-17 if "Bekerja" is selected
            questionsToShowIfWorking.forEach(id => {
                const questionElement = document.getElementById(`question-${id}`);
                if (questionElement) {
                    questionElement.style.display = 'block';
                }
            });
        }
    }

    function showAdditionalQuestions3(isYes) {
        const additionalInput = document.getElementById('additional-input');
        if (additionalInput) {
            // Show or hide the input field based on the "Ya" selection
            additionalInput.style.display = isYes ? 'block' : 'none';
        }
    }
</script> --}}
