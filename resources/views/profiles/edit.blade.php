@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-title">編輯個人檔案</h1>
        <div class="form">
            <div class="profile-edit">
                <div class="profile-container">
                    <div class="profile-avatar-edit">
                        <div class="avatar">
                            <img src="{{ asset('storage/' . $profile->avatar->image) }}" alt="image">
                        </div>
                    </div>
                    <div class="profile-item-edit">
                        <div class="profile-name">
                            <span class="profile-title username">{{ $profile->username }}</span>
                            <span class="profile-title name">{{ $user->name }}</span>
                        </div>
                    </div>
                </div>
                <div class="profile-container">
                    <div class="profile-item-edit">
                        <div class="profile-img-edit">
                            <div id="change-photo-label">變更相片</div>
                            <form id="#profile-form" action="{{ route('profile.avatar') }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <input type="file" id="avatar" name="avatar" accept=".png, .jpg, .jpeg"
                                    onchange="previewImage(this)" />
                                <button type="submit">test</button>
                            </form>
                            <!-- Overlay -->
                            <div id="overlay" class="hidden"></div>

                            <!-- Popup Menu -->
                            <div id="avatar-container" class="avatar-container hidden">
                                <div class="avatar-menu">
                                    <div class="avatar-item">
                                        <span>變更大頭貼</span>
                                    </div>
                                    <div class="avatar-item">
                                        <label for="avatar" type="button" id="upload-photo">上傳相片</label>
                                    </div>
                                    <div class="avatar-item">
                                        <div id="remove-photo">移除目前的大頭貼照</div>
                                    </div>
                                    <div class="avatar-item">
                                        <div id="cancel">取消</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <form action="{{ route('profiles.update', ['profile' => $profile]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-item">
                    <label for="username" class="form-field-name">使用者名稱 </label>
                    <input type="text" class="form-control" name="username" id="username"
                        value="{{ $profile->username }}" required />
                </div>

                <div class="form-item">
                    <label for="gender" class="form-field-name">性別</label>
                    <input type="text" class="form-control" name="gender" id="gender" value="{{ $profile->gender }}"
                        required />
                </div>

                <div class="form-item">
                    <label for="birthday" class="form-field-name">生日</label>
                    <input type="date" class="form-control" name="birthday" id=""
                        value="{{ $profile->birthday }}" required />
                </div>

                <div class="form-item-textarea">
                    <label class="form-name-textarea">個人簡介</label>
                    <textarea name="bio" class="form-control-textarea" style="resize: none;"></textarea>
                </div>

                <div class="form-item-btn">
                    <input class="btn-primary" type="submit" value="submit" />
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var changePhotoLabel = document.getElementById("change-photo-label");
            var photoMenu = document.getElementById("avatar-container");
            var overlay = document.getElementById("overlay");
            var removePhotoButton = document.getElementById("remove-photo");
            var cancelButton = document.getElementById("cancel");

            // Show the menu and overlay when clicking "變更相片"
            changePhotoLabel.addEventListener("click", function(event) {
                event.preventDefault();
                photoMenu.classList.remove("hidden");
                overlay.classList.remove("hidden");
            });

            // Hide the menu and overlay when clicking "取消"
            cancelButton.addEventListener("click", function() {
                photoMenu.classList.add("hidden");
                overlay.classList.add("hidden");
            });

            // Hide the menu and overlay when clicking outside of the menu
            document.addEventListener("click", function(event) {
                if (!photoMenu.contains(event.target) && !changePhotoLabel.contains(event.target)) {
                    photoMenu.classList.add("hidden");
                    overlay.classList.add("hidden");
                }
            });

            // Add functionality to "移除目前的大頭貼照"
            removePhotoButton.addEventListener("click", function() {
                // Your logic to remove the current photo goes here
                alert("移出目前相片");
                photoMenu.classList.add("hidden");
                overlay.classList.add("hidden");
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            var avatarInput = document.getElementById("avatar");

            avatarInput.addEventListener("change", function() {
                // 当文件上传框的值发生变化时触发
                this.submit(); // 提交表单
            });
        });
    </script>
@endsection
