@extends('layouts.app')
<script>
window.onload = function() {
    var createlightLogo = document.getElementById('createlightLogo');
    if (createlightLogo) {
        createlightLogo.src = "http://localhost:8080/Meal/public/images/create%20%E6%B7%B1.svg";
    }
};
</script>
@section('content')
    <div class="container">
        <h1 class="page-title">創建飯局</h1>

        <div class="form">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="form-item">
                    <label for="title" class="form-field-name">標題 :</label>
                    <input type="text" class="form-control" name="title" id="title" required />
                </div>

                <div class="form-item">
                    <label for="restaurant" class="form-field-name">餐廳 :</label>
                    <input type="text" class="form-control" name="restaurant" id="restaurant" required />
                </div>


                <div class="form-item">
                    <label for="date" class="form-field-name">日期 :</label>
                    <input type="date" class="form-control" name="date" />
                    <label for="time" class="form-field-name">時間 :</label>
                    <input type="time" class="form-control" id="time" name="time" value="<?= date('H').':00' ?>" step="3600">
                </div>

                <div class="form-item-textarea">
                    <label class="form-name-textarea">備註 :</label>
                    <textarea name="content" class="form-control-textarea" style="resize: none;"></textarea>
                </div>

                <div class="form-item-btn">
                    <input class="btn-primary" type="submit" value="submit" />
                </div>
            </form>
        </div>
    </div>
@endsection
