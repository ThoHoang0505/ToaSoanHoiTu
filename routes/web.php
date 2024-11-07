<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BanTinBienTapController;
use App\Http\Controllers\BoPhanController;
use App\Http\Controllers\LoaiTinController;
use App\Http\Controllers\QuanLyController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\NenTangController;
use App\Http\Controllers\BanTinHienTruongController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BantinXuatBanController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DocGiaController;
use App\Http\Controllers\HieuSuatController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\NhuanButController;
use App\Http\Controllers\ChuyenMucController;
use App\Http\Controllers\KiemDuyetController;
use App\Http\Controllers\NhanVienController;

//Route login - logout
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
//Route Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::post('/users/{id}/doi-mk', [UserController::class, 'doiMatKhau'])->name('users.doiMatKhau')->middleware('auth');
Route::post('/users/{id}/doi-chucvu', [UserController::class, 'doiChucVu'])->name('users.doiChucVu')->middleware('auth');
Route::get('/admin/phan-quyen', [UserController::class, 'xemQuyen'])->name('admin.quyen')->middleware('auth');
//Phan Quyen
Route::post('/phanquyen/them-quyen', [UserController::class, 'themQuyen'])->name('phanquyen.themQuyen')->middleware('auth');
Route::post('/phanquyen/xoa-quyen', [UserController::class, 'xoaQuyen'])->name('phanquyen.xoaQuyen')->middleware('auth');
//Quan Ly Nhan Vien
Route::middleware(['auth'])->group(function () {
    Route::get('/quanly', [QuanLyController::class, 'index'])->name('quanly.index')->middleware('auth');
    Route::get('/quanly/nhanvien', [QuanLyController::class, 'quanLyNhanVien'])->name('quanly.nhanvien');
    Route::get('/nhanvien/{id}', [QuanLyController::class, 'show'])->name('nhanvien.show');
    Route::get('/quanly/nhanvien/{id}/edit', [QuanLyController::class, 'edit'])->name('quanly.nhanvien.edit');
    Route::put('/quanly/nhanvien/{id}', [QuanLyController::class, 'update'])->name('quanly.nhanvien.update');
});
//Thong Tin Nhan Vien
Route::middleware(['auth'])->group(function () {
    Route::get('/thongtin/edit', [NhanVienController::class, 'thongTinNV'])->name('thongtinnv');
    Route::post('/thongtin/update', [NhanVienController::class, 'update'])->name('update');
});
//Quan Ly Loai Tin
Route::middleware(['auth'])->group(function () {
    Route::get('/quanly/loaitin', [LoaiTinController::class, 'index'])->name('quanly.loaitin.index');
    Route::get('/quanly/loaitin/create', [LoaiTinController::class, 'create'])->name('quanly.loaitin.create');
    Route::post('/quanly/loaitin', [LoaiTinController::class, 'store'])->name('quanly.loaitin.store');
    Route::get('quanly/loaitin/{MaLT}/edit', [LoaiTinController::class, 'edit'])->name('quanly.loaitin.edit');
    Route::put('quanly/loaitin/{MaLT}', [LoaiTinController::class, 'update'])->name('quanly.loaitin.update');
    Route::delete('/quanly/loaitin/{MaLT}', [LoaiTinController::class, 'destroy'])->name('quanly.loaitin.destroy');
});
//Quan Ly Bo Phan
Route::middleware(['auth'])->group(function () {
    Route::get('/quanly/bophan', [BoPhanController::class, 'index'])->name('quanly.bophan.index');
    Route::get('/quanly/bophan/create', [BoPhanController::class, 'create'])->name('quanly.bophan.create');
    Route::post('/quanly/bophan', [BoPhanController::class, 'store'])->name('quanly.bophan.store');
    Route::get('/quanly/bophan/{MaBP}/edit', [BoPhanController::class, 'edit'])->name('quanly.bophan.edit');
    Route::put('/quanly/bophan/{MaBP}', [BoPhanController::class, 'update'])->name('quanly.bophan.update');
    Route::delete('/quanly/bophan/{MaBP}', [BoPhanController::class, 'destroy'])->name('quanly.bophan.destroy');
});
//Quan Ly Chuc Vu
Route::middleware(['auth'])->prefix('quanly/chucvu')->group(function () {
    Route::get('/', [ChucVuController::class, 'index'])->name('quanly.chucvu.index');
    Route::get('/create', [ChucVuController::class, 'create'])->name('quanly.chucvu.create');
    Route::post('/', [ChucVuController::class, 'store'])->name('quanly.chucvu.store');
    Route::get('/{MaCV}/edit', [ChucVuController::class, 'edit'])->name('quanly.chucvu.edit');
    Route::put('/{MaCV}', [ChucVuController::class, 'update'])->name('quanly.chucvu.update');
    Route::delete('/{MaCV}', [ChucVuController::class, 'destroy'])->name('quanly.chucvu.destroy');
});
//Quan Ly Nen Tang
Route::middleware(['auth'])->group(function () {
    Route::get('/quanly/nentang', [NenTangController::class, 'index'])->name('quanly.nentang.index');
    Route::get('/quanly/nentang/create', [NenTangController::class, 'create'])->name('quanly.nentang.create');
    Route::post('/quanly/nentang', [NenTangController::class, 'store'])->name('quanly.nentang.store');
    Route::get('quanly/nentang/{MaNT}/edit', [NenTangController::class, 'edit'])->name('quanly.nentang.edit');
    Route::put('quanly/nentang/{MaNT}', [NenTangController::class, 'update'])->name('quanly.nentang.update');
    Route::delete('/quanly/nentang/{MaNT}', [NenTangController::class, 'destroy'])->name('quanly.nentang.destroy');
});
//Quan Ly Chuyen Muc
Route::prefix('quanly/chuyenmuc')->name('quanly.chuyenmuc.')->group(function () {
    Route::get('/', [ChuyenMucController::class, 'index'])->name('index');
    Route::get('/create', [ChuyenMucController::class, 'create'])->name('create');
    Route::post('/store', [ChuyenMucController::class, 'store'])->name('store');
    Route::get('/edit/{MaCM}', [ChuyenMucController::class, 'edit'])->name('edit');
    Route::put('/update/{MaCM}', [ChuyenMucController::class, 'update'])->name('update');
    Route::delete('/destroy/{MaCM}', [ChuyenMucController::class, 'destroy'])->name('destroy');
});
//Quan Ly Ban Tin Hien Truong
Route::middleware(['auth'])->group(function () {
    Route::get('/bantin/dangtai', [BanTinHienTruongController::class, 'create'])->name('quanly.bantin.dangtai');
    Route::post('/bantinhientruong', [BanTinHienTruongController::class, 'store'])->name('bantinhientruong.store');
    Route::get('/bantin-cua-ban', [BanTinHienTruongController::class, 'showUserBantin'])->name('bantin.cua_ban');
    Route::get('/bantinhientruong/{id}/edit', [BanTinHienTruongController::class, 'edit'])->name('bantinhientruong.edit');
    Route::put('/bantinhientruong/{id}', [BanTinHienTruongController::class, 'update'])->name('bantinhientruong.update');
});
//Route CKEditor
Route::post('/upload', [HomeController::class, 'upload'])->name('ckeditor.upload');
Route::get('/test', function () {
    return 'Route test successful!';
});
//Quan Ly Ban Tin Bien Tap
Route::middleware(['auth'])->group(function () {
    Route::get('/dem-yeu-cau', [QuanLyController::class, 'dem_yeucau'])->name('quanly.dem_yeucau');
    Route::get('/quanly/bantin/kho', [BanTinHienTruongController::class, 'khoBanTinHienTruong'])->name('quanly.bantin.kho');
    Route::get('bientap/edit/{id}', [BanTinBienTapController::class, 'edit'])->name('bientap.edit');
    Route::put('bientap/update/{id}', [BanTinBienTapController::class, 'update'])->name('bientap.update');
    Route::get('/bientap/bantin_cua_ban', [BanTinBienTapController::class, 'index'])->name('bientap.index');
    Route::get('/bientap/edit-bantin/{id}', [BanTinBienTapController::class, 'editBanTinBienTap'])->name('bientap.editBanTinBienTap');
    Route::put('/bientap/update-bantin/{id}', [BanTinBienTapController::class, 'updateBanTinBienTap'])->name('bientap.updateBanTinBienTap');
});
//Kiem Duyet Xuat Ban
Route::middleware(['auth'])->group(function () {
    Route::prefix('kiemduyet')->group(function () {
        Route::get('/', [KiemDuyetController::class, 'index'])->name('kiemduyet.index');
        Route::get('/{id}/chi-tiet', [KiemDuyetController::class, 'show'])->name('kiemduyet.show');
        Route::put('/{id}/yeu-cau-bien-tap-lai', [KiemDuyetController::class, 'yeuCauBT'])->name('kiemduyet.yeuCauBT');
        Route::post('/{id}/dang-tai', [KiemDuyetController::class, 'dangTaiBT'])->name('kiemduyet.dangTaiBT');
        Route::get('/theodoi', [BantinXuatBanController::class, 'theoDoiXB'])->name('kiemduyet.theodoi');
        Route::get('/bantin/{MaBT_XB}/xuat-ban-word', [BantinXuatBanController::class, 'xuatBanWord'])->name('bantin.xuatBanWord');
        Route::get('/bantin/{MaBT_XB}/facebook', [BantinXuatBanController::class, 'postToFacebook'])->name('bantin.postToFacebook');
    });    
});
//Quan Ly Hieu Suat
Route::middleware(['auth'])->group(function () {
    Route::get('/quanly/hieusuat/phongvien', [HieuSuatController::class, 'hieuSuatPhongVien'])->name('hieusuat.phongvien');
    Route::get('/quanly/hieusuat/bientapvien', [HieuSuatController::class, 'hieuSuatBienTapVien'])->name('hieusuat.bientapvien');
    Route::get('/quanly/hieusuat/kiemduyetvien', [HieuSuatController::class, 'hieuSuatKiemDuyetVien'])->name('hieusuat.kiemduyetvien');
});
//Route Doc Gia
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register'])->name('register.post');
Route::middleware(['auth'])->group(function () {
    Route::get('/account/edit', [DocGiaController::class, 'edit'])->name('account.edit');
    Route::post('/account/update', [DocGiaController::class, 'update'])->name('account.update');
}); 
//Route Ban Tin
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('bantin/{MaBT_XB}', [BantinXuatBanController::class, 'show'])->name('bantin.show');
Route::post('bantin/{maBT}/comment', [CommentController::class, 'store'])->name('bantin.comment.store');
Route::get('loaitin/{MaLT}', [BantinXuatBanController::class, 'showByLoaiTin'])->name('loaitin.show');
Route::get('chuyenmuc/{MaCM}', [BantinXuatBanController::class, 'showbyChuyenMuc'])->name('chuyenmuc.show');
Route::get('/searchpage', [BantinXuatBanController::class, 'searchPage'])->name('search.page');
Route::get('/search', [BantinXuatBanController::class, 'search'])->name('search');
//Quan Ly Nhuận Bút
Route::middleware(['auth'])->group(function () {
    Route::get('/quanly/nhuanbut', [NhuanButController::class, 'index'])->name('quanly.nhuanbut');
    Route::put('/nhuanbut/{id}', [NhuanButController::class, 'updatePaymentStatus'])->name('nhuanbut.update');
});
//Kiem Duyet Binh Luan
Route::middleware(['auth'])->group(function () {
    Route::get('/comments/chokd', [CommentController::class, 'choKD'])->name('comments.chokd');
    Route::put('/comments/{id}/pheduyet', [CommentController::class, 'pheDuyet'])->name('comments.pheduyet');
    Route::put('/comments/{id}/xoa', [CommentController::class, 'xoa'])->name('comments.xoa');
});
//Thống Kê
Route::middleware(['auth'])->group(function () {
    Route::get('/quanly/thongke', [BantinXuatBanController::class, 'thongKe'])->name('thongke');
});

