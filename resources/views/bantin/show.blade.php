@extends('layouts.app')

@section('content')
<div class="container mx-auto bg-white rounded-lg shadow-lg p-6 max-w-4xl">
   @if($bantins->loaiTin && $bantins->loaiTin->chuyenMuc)
   <p class="breadcrumbs text-gray-600 text-base mb-4">
       <a href="{{ route('chuyenmuc.show', $bantins->loaiTin->chuyenMuc->MaCM) }}" class="hover:text-blue-600">
           {{ $bantins->loaiTin->chuyenMuc->TenCM }}
       </a> 
       <span class="mx-1">&gt;</span>
       <a href="{{ route('loaitin.show', $bantins->loaiTin->MaLT) }}" class="hover:text-blue-600">
           {{ $bantins->loaiTin->TenLT }}
       </a>
   </p>
   @endif
   <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ $bantins->TieuDeBT_XB }}</h1>
   <div class="flex items-center justify-between mb-4 text-black-500">
   <p class="text-sm"><strong>Chuyên Mục:</strong> {{ $bantins->loaiTin ? $bantins->loaiTin->chuyenMuc->TenCM : 'Chưa có chuyên mục' }}</p>
      <p class="text-sm"><strong>Loại Tin:</strong> {{ $bantins->loaiTin ? $bantins->loaiTin->TenLT : 'Chưa có loại tin' }}</p>
      <p class="text-sm"><strong>Người Thực Hiện:</strong> {{ $bantins->TenPhongVien_XB }}, {{ $bantins->TenBienTapVien_XB }}</p>
      <p class="text-sm"><strong>Lượt xem:</strong> {{ $bantins->LuotXem }}</p>
   </div>
   @if($bantins->AnhDaiDien_XB)
   <img src="{{ asset($bantins->AnhDaiDien_XB) }}" alt="Ảnh đại diện" class="w-full h-80 object-cover mb-6 rounded-lg shadow-md article-image">
   @endif
   <div class="prose mb-8 text-sm text-gray-700 leading-loose">
      {!! $bantins->NoiDungBT_XB !!}
   </div>
   <div class="border-t pt-4">
      <h2 class="text-3xl font-semibold mb-4 text-gray-800">Bình luận</h2>
      @if(isset($comments) && !$comments->isEmpty())
      <div id="comments-list" class="space-y-4">
          @foreach($comments as $comment)
          <div class="border p-4 rounded bg-gray-50">
              <p class="font-bold">{{ $comment->user ? $comment->user->TenDangNhap : 'Người dùng ẩn danh' }}:</p>
              <p class="text-gray-700">{{ $comment->NoiDung }}</p>
              <p class="text-gray-500 text-sm mt-1">Đăng lúc: {{ \Carbon\Carbon::parse($comment->created_at)->format('H:i d/m/Y') }}</p>
          </div>
          @endforeach
      </div>
      <div class="mt-4">
          {{ $comments->links() }}
      </div>
      @else
      <p class="text-gray-600">Chưa có bình luận nào.</p>
      @endif
  </div>
   @auth
   <form id="commentForm" action="{{ route('bantin.comment.store', $bantins->MaBT_XB) }}" method="POST">
      @csrf
      <textarea name="NoiDung" class="w-full p-2 border rounded mb-4" placeholder="Nhập bình luận của bạn..." required></textarea>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Gửi bình luận</button>
   </form>
   @else
   <p class="mt-6 text-gray-600">Bạn cần <a href="{{ route('login') }}" class="text-blue-500 hover:underline">đăng nhập</a> để bình luận.</p>
   @endauth
   <div class="mt-8 text-center">
      <a href="{{ route('welcome') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
      Quay về trang chủ
      </a>
   </div>
   <h2 class="text-xl font-bold mt-6">Bản Tin Liên Quan</h2>
   @if($relatedBantins->isEmpty())
   <p class="text-xs text-gray-500">Không có bản tin liên quan.</p>
   @else
   <div class="flex flex-col">
      @foreach($relatedBantins as $relatedBantin)
      <a href="{{ route('bantin.show', ['MaBT_XB' => $relatedBantin->MaBT_XB]) }}" 
         class="block bg-white p-4 hover:shadow-lg mb-0 tin-tuc-item flex border-t border-b border-gray-300">
         @if($relatedBantin->AnhDaiDien_XB)
         <img src="{{ asset($relatedBantin->AnhDaiDien_XB) }}" class="w-24 h-24 object-cover rounded-lg mr-3">
         @endif
         <div class="flex-grow">
            <h4 class="text-lg font-medium mb-1 font-bold">{{ \Illuminate\Support\Str::limit($relatedBantin->TieuDeBT_XB, 50, '...') }}</h4>
            <p class="text-sm text-gray-500 mb-2">
               <span>{{ \Carbon\Carbon::parse($relatedBantin->NgayXuatBan)->format('d/m/Y H:i') }}</span>
            </p>
            <div class="prose line-clamp-3 text-gray-700">
               {!! preg_match('/<h2>(.*?)<\/h2>/', $relatedBantin->NoiDungBT_XB, $matches) ? $matches[1] : strip_tags(\Illuminate\Support\Str::limit($relatedBantin->NoiDungBT_XB, 150)) !!}
            </div>
         </div>
      </a>
      @endforeach
   </div>
   @endif
   <h2 class="text-xl font-bold mt-6">Bản Tin Bạn Có Thể Quan Tâm</h2>
   @php
   $randomBantins = \App\Models\BantinXuatBan::inRandomOrder()->take(5)->get();
   @endphp
   @if($randomBantins->isEmpty())
   <p class="text-xs text-gray-500">Không có bản tin để hiển thị.</p>
   @else
   <div class="flex flex-col">
      @foreach($randomBantins as $randomBantin)
      <a href="{{ route('bantin.show', ['MaBT_XB' => $randomBantin->MaBT_XB]) }}" 
         class="block bg-white p-4 hover:shadow-lg mb-0 tin-tuc-item flex border-t border-b border-gray-300">
         @if($randomBantin->AnhDaiDien_XB)
         <img src="{{ asset($randomBantin->AnhDaiDien_XB) }}" class="w-24 h-24 object-cover rounded-lg mr-3">
         @endif
         <div class="flex-grow">
            <h4 class="text-lg font-medium mb-1 font-bold">{{ \Illuminate\Support\Str::limit($randomBantin->TieuDeBT_XB, 50, '...') }}</h4>
            <p class="text-sm text-gray-500 mb-2">
               <span>{{ \Carbon\Carbon::parse($randomBantin->NgayXuatBan)->format('d/m/Y H:i') }}</span>
            </p>
            <div class="prose line-clamp-3 text-gray-700">
               {!! preg_match('/<h2>(.*?)<\/h2>/', $randomBantin->NoiDungBT_XB, $matches) ? $matches[1] : strip_tags(\Illuminate\Support\Str::limit($randomBantin->NoiDungBT_XB, 150)) !!}
            </div>
         </div>
      </a>
      @endforeach
   </div>
   @endif
</div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   $(document).ready(function () {
      $('#commentForm').on('submit', function (e) {
         e.preventDefault();
           $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: $(this).serialize(),
            success: function () {
               alert('Bình luận của bạn sẽ được kiểm duyệt và đăng tải sau.');
               $('textarea[name="NoiDung"]').val('');
            },
            error: function () {
                  alert('Có lỗi xảy ra, vui lòng thử lại!');
            }
           });
      });
      var dropdownButton = document.getElementById('dropdownButton');
      var dropdownMenu = document.getElementById('dropdownMenu');
      if (dropdownButton && dropdownMenu) {
         dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
         });
         window.addEventListener('click', function(e) {
            if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
               dropdownMenu.classList.add('hidden');
            }
         });
      }
   });
   document.addEventListener('DOMContentLoaded', function() {
      const oembedElements = document.querySelectorAll('oembed[url]');
      oembedElements.forEach(element => {
         const url = element.getAttribute('url');
         const iframe = document.createElement('iframe');
         iframe.setAttribute('width', '560');
         iframe.setAttribute('height', '315');
         iframe.setAttribute('src', url.replace("watch?v=", "embed/"));
         iframe.setAttribute('frameborder', '0');
         iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
         iframe.setAttribute('allowfullscreen', true);
         element.parentNode.replaceChild(iframe, element);
       });
   });
</script>
@endsection
