-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 28, 2024 lúc 08:08 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bantinbientap`
--

CREATE TABLE `bantinbientap` (
  `MaBT_BT` int(11) NOT NULL,
  `TieuDeBT_BT` varchar(255) NOT NULL,
  `LoaiBT_BT` int(11) NOT NULL,
  `NoiDungBT_BT` longtext NOT NULL,
  `AnhDaiDien_BT` varchar(255) NOT NULL,
  `NgayBienTap` timestamp NOT NULL DEFAULT current_timestamp(),
  `TenPhongVien` varchar(255) NOT NULL,
  `TenBienTapVien` varchar(255) NOT NULL,
  `MaNV_BTV` int(11) NOT NULL,
  `MaBTHT` int(11) NOT NULL,
  `TrangThai` varchar(255) NOT NULL,
  `PhienBan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bantinbientap`
--

INSERT INTO `bantinbientap` (`MaBT_BT`, `TieuDeBT_BT`, `LoaiBT_BT`, `NoiDungBT_BT`, `AnhDaiDien_BT`, `NgayBienTap`, `TenPhongVien`, `TenBienTapVien`, `MaNV_BTV`, `MaBTHT`, `TrangThai`, `PhienBan`) VALUES
(19, 'Test', 3, '<h2><i><strong>Test</strong></i></h2><p>Lại đi vẫn chưa được đâu</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/172882999_1728059128_png\"><figcaption>Chỉnh lại cả ảnh này</figcaption></figure>', 'images/thumbnail/1728059132.png', '2024-10-07 02:43:13', 'Nguyễn Văn A', 'Nguyễn Văn D', 19, 11, 'Đã Xuất Bản', 4),
(20, 'Bản Tin Thứ 3 Test Phóng Viên 1', 5, '<h2>Xin Chào 123</h2><p><i><strong>hágdhjgahjsgdhagshjdgahjsgdhjagshjdasjhdg</strong></i></p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/DG_TK.drawio_1728410158_png\"></figure>', 'images/thumbnail/1727790196.jpg', '2024-10-26 17:28:06', 'Nguyễn Phóng Viên', 'Nguyễn Văn D', 19, 7, 'Chờ Kiểm Duyệt', 7),
(21, 'Test 04-10-2020 11:34', 3, '<h2><i><strong>Test 04-10-2024 11:33 update</strong></i></h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/172882999_1728059618_png\"></figure>', 'images/thumbnail/1728059622.png', '2024-10-25 10:02:40', 'Nguyễn Phóng Viên', 'Trần Hoàng Thọ', 17, 12, 'Yêu Cầu Biên Tập Lại', 6),
(22, 'ABC Biên Tập', 3, '<h2>123</h2><p><i><strong>ABCDE</strong></i><img src=\"http://127.0.0.1:8000/media/Moon_1728065712_jpg\" alt=\"\"></p><p>&nbsp;</p>', 'images/thumbnail/1728065716.jpg', '2024-10-07 20:47:36', 'Nguyễn Văn A', 'Nguyễn Văn D', 19, 13, 'Đã Xuất Bản', 9),
(23, 'Bản Tin Test Phóng Viên 2', 4, '<h2><i><strong>ABCDEEEE</strong></i></h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/CoopTeam_1_1727788145_png\"></figure><p>&nbsp;</p>', 'images/thumbnail/1728409868.png', '2024-10-07 20:51:08', 'Nguyễn Văn A', 'Nguyễn Văn D', 19, 5, 'Đã Xuất Bản', 3),
(24, 'Bản Tin Thứ 2 Test Phóng Viên 1', 3, '<h2><i><strong>ABCDE</strong></i></h2><p>áhdjkhajshdjhajhwuhjkahsjkhduiqawhjahjkdas</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/CoopTeam_1_1727789758_png\"></figure><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/CoopTeam_2_1727969212_png\"></figure>', 'images/thumbnail/1727789762.jpg', '2024-10-07 21:21:23', 'Nguyễn Phóng Viên', 'Trần Hoàng Thọ', 17, 6, 'Đã Xuất Bản', 1),
(25, 'Test Phóng Viên 2.1', 5, '<h2><strong>VTV.vn - Câu lạc bộ tình nguyện của sinh viên tròn 14 tuổi vào ngày 5/9. Đó là hành trình dài nhiều nỗ lực của những bạn trẻ có tấm lòng hướng về cộng đồng.</strong></h2><p>Từ nhóm sinh viên tình nguyện cùng nhau hướng về cộng đồng năm 2010, đến nay câu lạc bộ Nét Bút Xanh đã có 14 năm phát triển với hàng loạt dự án thiện nguyện ý nghĩa cùng 60 thành viên chính thức tại TP Hồ Chí Minh, Bến Tre, Kiên Giang… Ngoài ra câu lạc bộ còn có các tình nguyện viên tham gia không chính thức tới hơn 200 người.</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/hinh-dep_1728447427_jpg\"></figure><p>Thuận lợi của câu lạc bộ Nét Bút Xanh là trực thuộc Trung tâm Tình nguyện Quốc gia (TW Đoàn Thanh niên Cộng sản Hồ Chí Minh) nên hoạt động dưới sự chỉ đạo, hướng dẫn của Trung tâm, cũng như Ban thường trực Mạng lưới Tình nguyện Quốc gia khu vực miền Nam. Do đó các hoạt động của câu lạc bộ luôn đúng tiêu chí, phương châm hoạt động của mình trên tinh thần tự nguyện, công khai minh bạch, đúng địa điểm, đúng đối tượng.</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/1673574526_hinh-nen-hoa-tulip-anvien_1728447453_jpg\"></figure><p>Câu lạc bộ duy trì hoạt động truyền thống, cùng với thực hiện các hoạt động mang tính bền vững như các dự án Nhà Hạnh Phúc hỗ trợ xây và sữa chữa những hoàn cảnh khó khăn về nhà ở, Xây cầu Hạnh Phúc xóa cầu tạm, cầu xuống cấp tại các tỉnh miền Tây; Vườn cây Hạnh Phúc tặng cây giống cho các hộ gia đình khó khăn có ít đất để gia đình chăm sóc và có nguồn thu nhập trong cuộc sống; dự án học bổng Chắp cánh ước mơ nhận đỡ đầu và hỗ trợ kinh phí học tập cho học sinh có hoàn cảnh khó khăn vươn lên trong học tập, và tiếp tục thực hiện dự án hỗ trợ cơm trưa cho học sinh lớp học tình thương Việt Nam - Campuchia tại Biển Hồ, Campuchia…</p><p>Sự phát triển từ nhóm sinh viên tự phát trở thành câu lạc bộ có quy mô hoạt động như hiện nay không chỉ có tấm lòng là đủ. Cách vận hành và quản lý luôn khoa học, rõ ràng, minh bạch là một trong những điều quan trọng giúp cho câu lạc bộ phát triển vững mạnh. Anh Trương Văn Vũ học chuyên ngành kế toán nên câu lạc bộ mở sổ sách thu – chi công khai, minh bạch trên trang web và các nền tảng mạng xã hội, ứng dụng ngân hàng… để các nhà hảo tâm có thể theo dõi trực tiếp quá trình kêu gọi đóng góp, chi phí các hoạt động. Tiêu chí của câu lạc bộ là không làm quỹ mà gói gọn chi phí trong một chương trình.</p>', 'images/thumbnail/1728447459.jpg', '2024-10-08 07:17:39', 'Nguyễn Phóng Viên', 'Trần Hoàng Thọ', 17, 9, 'Đã Xuất Bản', 3),
(26, 'Test 10/10/2024', 8, '<h2><i><strong>Test 10/10/2024</strong></i></h2><p>Test 10/10/2024</p><p>Test 10/10/2024</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/BTBT_BTXB.drawio (1)_1728542338_png\"></figure><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/BTBT_LT.drawio_1728542339_png\"></figure><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/BTHT_BTBT.drawio_1728542339_png\"></figure><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/BTHT_LT.drawio_1728542339_png\"></figure>', 'images/thumbnail/1728542354.png', '2024-10-09 16:50:41', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 23, 'Đã Xuất Bản', 3),
(27, 'Bản Tin Test Phóng Viên 1', 3, '<h2>ABCDE</h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/Moon_1727788088_jpg\"></figure>', 'images/thumbnail/1727788095.jpg', '2024-10-10 16:31:51', 'Nguyễn Phóng Viên', 'Trần Hoàng Thọ', 17, 4, 'Đã Xuất Bản', 1),
(28, 'Trong Nước 2', 3, '<p>Trong Nước 2Trong Nước 2Trong Nước 2Trong Nước 2</p>', 'images/thumbnail/1729440673.jpg', '2024-10-20 09:11:46', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 34, 'Đã Xuất Bản', 1),
(29, 'Trong Nước 1', 11, '<p>Trong Nước 1Trong Nước 1Trong Nước 1</p>', 'images/thumbnail/1729440660.jpg', '2024-10-20 09:11:50', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 33, 'Đã Xuất Bản', 1),
(30, 'Âm Nhạc 1', 8, '<p>Âm Nhạc 2Âm Nhạc 2Âm Nhạc 2Âm Nhạc 2</p>', 'images/thumbnail/1729440641.jpg', '2024-10-20 09:11:53', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 32, 'Đã Xuất Bản', 1),
(31, 'Âm Nhạc 2', 8, '<p>Âm Nhạc 2Âm Nhạc 2Âm Nhạc 2</p>', 'images/thumbnail/1729440619.jpg', '2024-10-20 09:11:56', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 31, 'Đã Xuất Bản', 1),
(32, 'Âm Nhạc 1', 8, '<p>Âm Nhạc 1Âm Nhạc 1Âm Nhạc 1</p>', 'images/thumbnail/1729440599.jpg', '2024-10-20 09:11:59', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 30, 'Đã Xuất Bản', 1),
(33, 'Quân sự 2', 3, '<p>Quân sự 2Quân sự 2Quân sự 2</p>', 'images/thumbnail/1729440578.jpg', '2024-10-20 09:12:02', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 29, 'Đã Xuất Bản', 1),
(34, 'Quân sự 1', 5, '<p>Quân sự 1Quân sự 1Quân sự 1</p>', 'images/thumbnail/1729440559.jpg', '2024-10-20 09:12:05', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 28, 'Đã Xuất Bản', 1),
(35, 'Quốc tế 2', 3, '<p>Quốc tế 1Quốc tế 1</p>', 'images/thumbnail/1729440541.jpg', '2024-10-20 09:12:09', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 27, 'Đã Xuất Bản', 1),
(36, 'Quốc tế 1', 4, '<p>Quốc tế 1Quốc tế 1</p>', 'images/thumbnail/1729440529.jpg', '2024-10-20 09:12:12', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 26, 'Đã Xuất Bản', 1),
(37, 'Kinh tế 2', 3, '<p>Kinh tế 1Kinh tế 1Kinh tế 1</p>', 'images/thumbnail/1729440504.jpg', '2024-10-20 09:12:15', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 25, 'Đã Xuất Bản', 1),
(38, 'Kinh tế 1', 3, '<p>Kinh tế 1 Kinh tế 1 <img src=\"http://127.0.0.1:8000/media/1727787354_1729440482_jpg\">Kinh tế 1</p>', 'images/thumbnail/1729440488.jpg', '2024-10-20 09:12:20', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 24, 'Đã Xuất Bản', 1),
(39, 'Trong Nước 222', 11, '<p>Trong Nước 222Trong Nước 222Trong Nước 222</p>', 'images/thumbnail/1729441065.jpg', '2024-10-20 09:18:01', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 36, 'Đã Xuất Bản', 1),
(40, 'Trong Nước 22', 11, '<p>Trong Nước 22Trong Nước 22Trong Nước 22</p>', 'images/thumbnail/1729441048.jpg', '2024-10-20 09:18:04', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 35, 'Đã Xuất Bản', 1),
(41, 'Trong Nước 222', 11, '<h2><strong>VTV.vn- Temu đã có văn bản chính thức gửi Cục Thương mại điện tử và Kinh tế số về việc thực hiện các yêu cầu tuân thủ pháp luật thương mại điện tử Việt Nam khi gia nhập thị trường.</strong></h2><p>Thông tin từ Cục Thương mại điện tử và Kinh tế số (Bộ Công Thương), Temu là nền tảng thương mại điện tử xuyên biên giới có ngôn ngữ thể hiện tiếng Việt và thuộc phạm vi điều chỉnh của Nghị định số 52/2013 ngày 16/5/2013 của Chính phủ về thương mại điện tử (được sửa đổi, bổ sung bởi Nghị định số 85/2021).<br>&nbsp;</p><p>Ngày 24/10, Temu đã có văn bản chính thức gửi Cục Thương mại điện tử và Kinh tế số về việc thực hiện các yêu cầu tuân thủ pháp luật thương mại điện tử Việt Nam khi gia nhập thị trường.</p><p>Theo Cục Thương mại điện tử và Kinh tế số, Việt Nam là một trong những quốc gia có tốc độ phát triển thương mại điện tử trung bình 25%/năm, thuộc top đầu so với các quốc gia khác ở Đông Nam Á.</p><p>Thị trường bán lẻ thương mại điện tử ước đạt 20,5 tỷ USD năm 2023, số lượng người tiêu dùng mua sắm trực tuyến hiện đang vượt ngưỡng 61 triệu người và giá trị mua sắm trực tuyến của một người vào khoảng 336 USD.</p>', 'images/thumbnail/1729778501.jpg', '2024-10-24 07:01:58', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 37, 'Đã Xuất Bản', 1),
(42, 'Hhh hhh hhh hh hhhhh hhhh hhhh hhhhh hh hhh hhh hhhh hhhhh hh hhh hhhh hhh', 3, '<p>hhhhhhhhhhhhhhhhhhhh</p>', 'images/thumbnail/1729860850.jpg', '2024-10-25 05:54:20', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 38, 'Đã Xuất Bản', 1),
(44, 'Bão Trà Mi còn mạnh lên, gây mưa rất to và lũ quét ở miền Trung.', 11, '<h2><i><strong>(Dân trí) - Dự báo khi di chuyển đến quần đảo Hoàng Sa, bão Trà Mi di chuyển chậm lại và cường độ suy yếu dần do có khối không khí lạnh di chuyển xuống đẩy bão đi lệch xuống phía Nam rồi di chuyển ra ngoài.</strong></i></h2><p>Chiều 25/10, ông Hoàng Phúc Lâm, Phó Giám đốc Trung tâm Dự báo Khí tượng Thủy văn Quốc gia cho biết, bão Trà Mi (bão số 6) đang hướng về quần đảo Hoàng Sa với tốc độ khá nhanh khoảng 15-20km/h.</p><p>Dự báo trong khoảng 24 đến 48 giờ tới, bão di chuyển tương đối ổn định và cường độ còn mạnh lên. Cường độ cực đại trên Biển Đông có thể đạt cấp 11-12, giật cấp 13-14.</p><p>Theo ông Lâm, khi bão Trà Mi đi đến quần đảo Hoàng Sa, bão có xu hướng di chuyển chậm lại và cường độ suy yếu dần do có khối không khí lạnh di chuyển xuống đẩy bão đi lệch xuống phía Nam rồi di chuyển ra ngoài.</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/dl_1729875462_jpg\"></figure><p>Ông Lâm cho hay, bão duy trì tương đối lâu trong những ngày tới dẫn tới tình trạng khu vực giữa và Nam Biển Đông hình thành một dải hội tụ nhiệt đới gây mưa kéo dài ở Trung Bộ.</p><p>\"Cũng có những kịch bản ít khả năng xảy ra hơn đó là khi bão vào khu vực Hoàng Sa sẽ suy yếu đi nhưng bão vẫn di chuyển vào bờ và suy yếu trên đất liền Việt Nam. Kịch bản này có khả năng xảy ra thấp hơn (xác suất 30%) so với kịch bản bão trôi xuống phía Nam rồi đi ra phía ngoài biển (xác suất 60%)\", ông Lâm nói.</p><p>Theo ông Lâm, hai kịch bản ông quan tâm&nbsp;đến&nbsp;vấn đề mưa lớn ở Trung Trung Bộ, đây là nơi chịu ảnh hưởng lớn nhất của bão số 6.</p>', 'images/thumbnail/1729875475.jpg', '2024-10-25 09:58:02', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 40, 'Đã Xuất Bản', 1),
(45, 'Những món ăn đậm \"chất thu\" của Hà Nội', 12, '<h2><strong>VTV.vn - Những món ăn đậm \"chất thu\" của Hà Nội khiến ai đã từng một lần trải nghiệm đều khó có thể quên.</strong></h2><p><br><img src=\"http://127.0.0.1:8000/media/1_1730017619_png\"></p>', 'images/thumbnail/1730017627.jpg', '2024-10-27 08:27:44', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 41, 'Đã Xuất Bản', 1),
(46, 'Huế và Quảng Trị nhận kỷ vật của vua Hàm Nghi', 12, '<h2><strong>VTV.vn - Khay trà, tẩu thuốc và bộ sách chữ Hán được hậu duệ của vua Hàm Nghi trao tặng cho hai địa phương này.</strong></h2><ul><li>&nbsp;</li></ul><p>Khay và tẩu thuốc cùng chất liệu gỗ khảm ốc xà cừ. Chiếc khay dài hơn 31 cm, rộng hơn 18 cm và cao 10 cm. Bộ sách bằng chữ Hán có ba cuốn là&nbsp;Ngự chế canh chức đồ&nbsp;(hai chương),&nbsp;Đan đồ huyện chí&nbsp;(25 chương) và&nbsp;Tăng đính thi kinh thể chú diễn nghĩa&nbsp;(năm chương).</p><p>Các kỷ vật này được Tiến sĩ Amandine Dabat - hậu duệ đời thứ năm của vua Hàm Nghi - giao cho Đại sứ quán Việt Nam tại Paris và đại diện Bảo tàng Mỹ Thuật Việt Nam, ông Nguyễn Anh Minh mang về Việt Nam.</p><p>Trước đó vào tháng 12/2022, Thừa Thiên Huế đã&nbsp;đón nhận&nbsp;bức tranh vua Hàm Nghi vẽ lúc bị lưu đày ở Algérie - do hậu duệ đời thứ năm của ông trao tặng.</p><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/26/vua-73422168599115859778576.jpg\" alt=\"Huế và Quảng Trị nhận kỷ vật của vua Hàm Nghi - Ảnh 1.\"></figure><p>Lãnh đạo Bảo tàng Mỹ thuật Việt Nam trao lại kỷ vật của vua Hàm Nghi cho Giám đốc Trung tâm Bảo tồn Di tích Cố đô Huế</p><p>Ông Hoàng Việt Trung, Giám đốc Trung tâm Bảo tồn Di tích Cố đô Huế, cho biết, hoạt động tiếp nhận có ý nghĩa quan trọng đối với công tác bảo tồn di sản và khơi gợi, tôn vinh những giá trị lịch sử của dân tộc. Theo ông Trung, việc hồi hương các kỷ vật mang lại cơ hội để người dân trong nước, nhất là thế hệ trẻ được tìm hiểu thêm về vua Hàm Nghi.</p><p>Ngày 5/11 tới, Trung tâm Bảo tồn Di tích Cố đô Huế sẽ tổ chức tọa đàm ra mắt cuốn sách <i>Hàm nghi: Hoàng đế lưu vong - Nghệ sĩ ở Alger</i> của Tiến sĩ Amandine Dabat.</p><p>Vua Hàm Nghi&nbsp;sinh năm 1871, tên húy là Nguyễn Phúc Ưng Lịch. Ông lên ngôi năm 1884 khi mới 13 tuổi, là hoàng đế thứ tám của nhà Nguyễn. Năm 1885, sau khi kinh đô Huế thất thủ, vua Hàm Nghi cùng Tôn Thất Thuyết rời khỏi kinh thành. Ngày 13/7 cùng năm, tại thành Tân Sở ở Cam Lộ (Quảng Trị), vua ban chiếu Cần Vương, kêu gọi thần dân khắp ba miền chống Pháp. Năm 1888, vua bị bắt và bị Pháp đưa đi lưu đày ở Alger (thủ đô Algérie). Thời gian sống ở đây,&nbsp;tài năng&nbsp;hội họa của ông được khai phá. Nhà vua qua đời vào năm 1944 vì bệnh ung thư dạ dày.</p>', 'images/thumbnail/1730017773.jpg', '2024-10-27 08:29:47', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 42, 'Đã Xuất Bản', 1),
(47, 'Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương', 12, '<h2><strong>VTV.vn - Sở Du lịch tỉnh Ninh Bình vừa tổ chức khai mạc Lễ hội Khinh khí cầu Tràng An - Cúc Phương năm 2024 với chủ đề \"Tuyệt sắc miền Cố đô\".</strong></h2><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-khai-mac-07362019450832052667798.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 1.\"></figure><p>Đây là hoạt động trong chuỗi các hoạt động văn hóa, du lịch chào mừng kỷ niệm 10 năm Quần thể Danh thắng Tràng An được UNESCO ghi danh là Di sản văn hóa&nbsp;và thiên nhiên thế giới (2014 - 2024), Lễ hội Khinh khí cầu Tràng An - Cúc Phương năm 2024 được tổ chức nhằm tạo ra sản phẩm du lịch mới hiện đại, đặc sắc, độc đáo. Qua đó, góp phần đa dạng hóa sản phẩm du lịch, tạo sức hấp dẫn, thu hút đông đảo nhân dân, du khách trong nước và quốc tế. Lễ hội góp phần tăng cường quảng bá hình ảnh thương hiệu điểm đến du lịch, văn hóa, con người, tiềm năng, lợi thế phát triển Ninh Bình trở thành trung tâm du lịch quốc gia, quốc tế và là điểm đến của các lễ hội bốn mùa.</p><p>Theo ông Bùi Văn Mạnh, Giám đốc Sở Du lịch tỉnh Ninh Bình cho biết: Lễ hội có 35 khinh khí cầu và dù lượn, được điều khiển bởi phi công nước ngoài và thành viên Câu lạc bộ Dù lượn thành phố Hà Nội. Trong khuôn khổ Lễ hội sẽ diễn ra nhiều hoạt động như: Trình diễn ánh sáng khinh khí cầu, các chương trình nghệ thuật; trưng bày đặc sản OCOP các vùng miền...</p><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-khai-mac5-43902172721264852421705.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 2.\"></figure><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-khai-mac4-16206687196342183682156.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 3.\"></figure><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-khai-mac-65-00033441168142691043913.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 4.\"></figure><p>Các tiết mục văn hóa, văn nghệ đặc sắc được trình diễn tại Lễ khai mạc</p><p>Qua Lễ hội, Ban tổ chức mong muốn sẽ mang đến cho nhân dân, du khách những trải nghiệm ấn tượng, cảm giác thú vị, khó quên khi được ngắm nhìn từ trên cao không gian, cảnh quan tươi đẹp, hùng vĩ của Di sản văn hóa và thiên nhiên thế giới Tràng An; thành phố Hoa Lư - Đô thị di sản thiên niên kỷ trong tương lai. Du khách sẽ được hòa mình vào không gian sôi động của những bữa tiệc âm nhạc, nghệ thuật sôi động, hấp dẫn; đồng thời có những trải nghiệm, khám phá, tìm hiểu về các nét văn hóa&nbsp;đặc trưng của Ninh Bình; thưởng thức các món ẩm thực mang hương vị đặc sắc của vùng đất Cố Đô và tham quan, trải nghiệm các dịch vụ đẳng cấp tại những khu, điểm du lịch nổi tiếng của địa phương.</p><p>&nbsp;</p><p>Tỉnh Ninh Bình có tài nguyên du lịch đa dạng, phong phú và hấp dẫn. Trong những năm gần đây, hình ảnh, thương hiệu điểm đến du lịch Ninh Bình liên tục được quảng bá trên các phương tiện thông tin đại chúng và trên mạng xã hội. Đồng thời, hiệu quả kinh tế về du lịch tăng khá mạnh,&nbsp; riêng trong 10 tháng đầu năm 2024, du lịch Ninh Bình đã đón trên 7,68 triệu lượt khách, trong đó đón trên 978 nghìn lượt khách quốc tế. Doanh thu đạt hơn 7.773 tỷ đồng, tăng 40% so với cùng kỳ năm 2023.</p><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khach-du-lich--en-ninh-binh-sau-bao-so-37-29062962468020801380137.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 5.\"></figure><p>Ninh Bình đang vào mùa rất đẹp</p><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-67802119854116539181888.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 6.\"></figure><p>Lễ hội diễn ra đến hết ngày 29/10. Cũng theo Sở Du lịch tỉnh Ninh Bình, khi thời tiết tốt hơn, các hoạt động bay sẽ được Ban tổ chức thông báo sớm cho du khách và nhân dân đến tham gia trải nghiệm.</p>', 'images/thumbnail/1730018001.jpg', '2024-10-27 08:33:38', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 43, 'Đã Xuất Bản', 1),
(48, 'Test', 23, '<h2><i><strong>ABCDE</strong></i></h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/CoopTeam_3_1730139716_png\"></figure>', 'images/thumbnail/1730139721.jpg', '2024-10-28 18:39:29', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 44, 'Chờ Kiểm Duyệt', 1),
(49, 'Test Mới', 5, '<h2><i><strong>AVBCDEE</strong></i></h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/172882999_1728408960_png\"></figure>', 'images/thumbnail/1728408977.png', '2024-10-28 18:48:54', 'Nguyễn Văn A', 'Trần Hoàng Thọ', 17, 22, 'Chờ Kiểm Duyệt', 2),
(50, 'Test 29/10/2024', 22, '<h2><i><strong>Chứng khoán 29/10/2024 Update</strong></i></h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/Moon_1730141674_jpg\"></figure>', 'images/thumbnail/1730141679.jpg', '2024-10-28 19:00:51', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 45, 'Đã Xuất Bản', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bantinhientruong`
--

CREATE TABLE `bantinhientruong` (
  `MaBT_HT` int(11) NOT NULL,
  `TieuDeBT_HT` varchar(255) NOT NULL,
  `LoaiBT_HT` int(11) NOT NULL,
  `NoiDungBT_HT` longtext NOT NULL,
  `AnhDaiDien_HT` varchar(255) NOT NULL,
  `NgayDang_HT` timestamp NOT NULL DEFAULT current_timestamp(),
  `TenPhongVien` varchar(255) NOT NULL,
  `MaNV_PV` int(11) NOT NULL,
  `TrangThai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bantinhientruong`
--

INSERT INTO `bantinhientruong` (`MaBT_HT`, `TieuDeBT_HT`, `LoaiBT_HT`, `NoiDungBT_HT`, `AnhDaiDien_HT`, `NgayDang_HT`, `TenPhongVien`, `MaNV_PV`, `TrangThai`) VALUES
(4, 'Bản Tin Test Phóng Viên 1', 3, '<h2>ABCDE</h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/Moon_1727788088_jpg\"></figure>', 'images/thumbnail/1727788095.jpg', '2024-10-03 19:24:18', 'Nguyễn Phóng Viên', 18, 'Đã Xuất Bản'),
(5, 'Bản Tin Test Phóng Viên 2', 4, '<h2>ABCDEEEE</h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/CoopTeam_1_1727788145_png\"></figure><p>&nbsp;</p>', 'images/thumbnail/1727788150.jpg', '2024-10-07 00:55:30', 'Nguyễn Văn A', 23, 'Đã Xuất Bản'),
(6, 'Bản Tin Thứ 2 Test Phóng Viên 1', 3, '<h2>ABCDE</h2><p>áhdjkhajshdjhajhwuhjkahsjkhduiqawhjahjkdas</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/CoopTeam_1_1727789758_png\"></figure><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/CoopTeam_2_1727969212_png\"></figure>', 'images/thumbnail/1727789762.jpg', '2024-10-03 19:24:33', 'Nguyễn Phóng Viên', 18, 'Đã Xuất Bản'),
(7, 'Bản Tin Thứ 3 Test Phóng Viên 1', 5, '<h2>Xin Chào 123</h2><p><i><strong>hágdhjgahjsgdhagshjdgahjsgdhjagshjdasjhdg</strong></i></p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/Switch_1727790184_png\"></figure>', 'images/thumbnail/1727790196.jpg', '2024-10-03 19:29:54', 'Nguyễn Phóng Viên', 18, 'Đang Biên Tập'),
(8, 'Bản Tin Test Trạng Thái', 12, '<h2>Trạng Thái Mặc Định Sẽ Là “Chờ Biên Tập” Sua</h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/CoopTeam_3_1727791198_png\"></figure><p>&nbsp;</p>', 'images/thumbnail/1727791203.jpg', '2024-09-30 20:03:31', 'Nguyễn Văn A', 23, 'Chờ Biên Tập'),
(9, 'Test Phóng Viên 2.1', 5, '<h2>Hello World</h2><p><i><strong>ABCDE</strong></i></p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/Moon_1727802076_jpg\"></figure><p>&nbsp;</p>', 'images/thumbnail/1727791378.jpg', '2024-10-03 19:15:45', 'Nguyễn Phóng Viên', 18, 'Đã Xuất Bản'),
(10, 'ABCDE', 12, '<h2><i><strong>ABCDERGHJUHIHI</strong></i></h2>', 'images/thumbnail/1727964197.jpg', '2024-10-02 17:03:43', 'Nguyễn Văn A', 23, 'Chờ Biên Tập'),
(11, 'Test', 3, '<h2><i><strong>Test</strong></i></h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/172882999_1728059128_png\"></figure>', 'images/thumbnail/1728059132.png', '2024-10-03 19:29:45', 'Nguyễn Văn A', 23, 'Đã Xuất Bản'),
(12, 'Test 04-10-2020 11:34', 3, '<h2>Test 04-10-2020 11:33</h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/172882999_1728059618_png\"></figure>', 'images/thumbnail/1728059622.png', '2024-10-03 19:37:03', 'Nguyễn Phóng Viên', 18, 'Đang Biên Tập'),
(13, 'ABC', 3, '<h2>123</h2><p>ABCDE<img src=\"http://127.0.0.1:8000/media/Moon_1728065712_jpg\"></p><p>&nbsp;</p>', 'images/thumbnail/1728065716.jpg', '2024-10-03 21:15:36', 'Nguyễn Văn A', 23, 'Đã Xuất Bản'),
(22, 'Test Mới', 12, '<h2><i><strong>AVBCDEE</strong></i></h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/172882999_1728408960_png\"></figure>', 'images/thumbnail/1728408977.png', '2024-10-07 20:36:17', 'Nguyễn Văn A', 23, 'Đang Biên Tập'),
(23, 'Test 10/10/2024', 8, '<h2><i><strong>Test 10/10/2024</strong></i></h2><p>Test 10/10/2024</p><p>Test 10/10/2024</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/BTBT_BTXB.drawio (1)_1728542338_png\"></figure><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/BTBT_LT.drawio_1728542339_png\"></figure><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/BTHT_BTBT.drawio_1728542339_png\"></figure><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/BTHT_LT.drawio_1728542339_png\"></figure>', 'images/thumbnail/1728542354.png', '2024-10-09 16:39:14', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(24, 'Kinh tế 1', 3, '<p>Kinh tế 1 Kinh tế 1 <img src=\"http://127.0.0.1:8000/media/1727787354_1729440482_jpg\">Kinh tế 1</p>', 'images/thumbnail/1729440488.jpg', '2024-10-20 09:08:08', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(25, 'Kinh tế 2', 3, '<p>Kinh tế 1Kinh tế 1Kinh tế 1</p>', 'images/thumbnail/1729440504.jpg', '2024-10-20 09:08:24', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(26, 'Quốc tế 1', 4, '<p>Quốc tế 1Quốc tế 1</p>', 'images/thumbnail/1729440529.jpg', '2024-10-20 09:08:49', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(27, 'Quốc tế 2', 3, '<p>Quốc tế 1Quốc tế 1</p>', 'images/thumbnail/1729440541.jpg', '2024-10-20 09:09:01', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(28, 'Quân sự 1', 5, '<p>Quân sự 1Quân sự 1Quân sự 1</p>', 'images/thumbnail/1729440559.jpg', '2024-10-20 09:09:19', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(29, 'Quân sự 2', 3, '<p>Quân sự 2Quân sự 2Quân sự 2</p>', 'images/thumbnail/1729440578.jpg', '2024-10-20 09:09:38', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(30, 'Âm Nhạc 1', 8, '<p>Âm Nhạc 1Âm Nhạc 1Âm Nhạc 1</p>', 'images/thumbnail/1729440599.jpg', '2024-10-20 09:09:59', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(31, 'Âm Nhạc 2', 8, '<p>Âm Nhạc 2Âm Nhạc 2Âm Nhạc 2</p>', 'images/thumbnail/1729440619.jpg', '2024-10-20 09:10:19', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(32, 'Âm Nhạc 1', 8, '<p>Âm Nhạc 2Âm Nhạc 2Âm Nhạc 2Âm Nhạc 2</p>', 'images/thumbnail/1729440641.jpg', '2024-10-20 09:10:41', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(33, 'Trong Nước 1', 11, '<p>Trong Nước 1Trong Nước 1Trong Nước 1</p>', 'images/thumbnail/1729440660.jpg', '2024-10-20 09:11:00', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(34, 'Trong Nước 2', 3, '<p>Trong Nước 2Trong Nước 2Trong Nước 2Trong Nước 2</p>', 'images/thumbnail/1729440673.jpg', '2024-10-20 09:11:13', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(35, 'Trong Nước 22', 11, '<p>Trong Nước 22Trong Nước 22Trong Nước 22</p>', 'images/thumbnail/1729441048.jpg', '2024-10-20 09:17:28', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(36, 'Trong Nước 222', 11, '<p>Trong Nước 222Trong Nước 222Trong Nước 222</p>', 'images/thumbnail/1729441065.jpg', '2024-10-20 09:17:45', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(37, 'Trong Nước 222', 11, '<h2><strong>VTV.vn- Temu đã có văn bản chính thức gửi Cục Thương mại điện tử và Kinh tế số về việc thực hiện các yêu cầu tuân thủ pháp luật thương mại điện tử Việt Nam khi gia nhập thị trường.</strong></h2><p>Thông tin từ Cục Thương mại điện tử và Kinh tế số (Bộ Công Thương), Temu là nền tảng thương mại điện tử xuyên biên giới có ngôn ngữ thể hiện tiếng Việt và thuộc phạm vi điều chỉnh của Nghị định số 52/2013 ngày 16/5/2013 của Chính phủ về thương mại điện tử (được sửa đổi, bổ sung bởi Nghị định số 85/2021).<br>&nbsp;</p><p>Ngày 24/10, Temu đã có văn bản chính thức gửi Cục Thương mại điện tử và Kinh tế số về việc thực hiện các yêu cầu tuân thủ pháp luật thương mại điện tử Việt Nam khi gia nhập thị trường.</p><p>Theo Cục Thương mại điện tử và Kinh tế số, Việt Nam là một trong những quốc gia có tốc độ phát triển thương mại điện tử trung bình 25%/năm, thuộc top đầu so với các quốc gia khác ở Đông Nam Á.</p><p>Thị trường bán lẻ thương mại điện tử ước đạt 20,5 tỷ USD năm 2023, số lượng người tiêu dùng mua sắm trực tuyến hiện đang vượt ngưỡng 61 triệu người và giá trị mua sắm trực tuyến của một người vào khoảng 336 USD.</p>', 'images/thumbnail/1729778501.jpg', '2024-10-24 07:01:41', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(38, 'Hhh hhh hhh hh hhhhh hhhh hhhh hhhhh hh hhh hhh hhhh hhhhh hh hhh hhhh hhh', 3, '<p>hhhhhhhhhhhhhhhhhhhh</p>', 'images/thumbnail/1729860850.jpg', '2024-10-25 05:54:10', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(40, 'Bão Trà Mi còn mạnh lên, gây mưa rất to và lũ quét ở miền Trung.', 11, '<h2><i><strong>(Dân trí) - Dự báo khi di chuyển đến quần đảo Hoàng Sa, bão Trà Mi di chuyển chậm lại và cường độ suy yếu dần do có khối không khí lạnh di chuyển xuống đẩy bão đi lệch xuống phía Nam rồi di chuyển ra ngoài.</strong></i></h2><p>Chiều 25/10, ông Hoàng Phúc Lâm, Phó Giám đốc Trung tâm Dự báo Khí tượng Thủy văn Quốc gia cho biết, bão Trà Mi (bão số 6) đang hướng về quần đảo Hoàng Sa với tốc độ khá nhanh khoảng 15-20km/h.</p><p>Dự báo trong khoảng 24 đến 48 giờ tới, bão di chuyển tương đối ổn định và cường độ còn mạnh lên. Cường độ cực đại trên Biển Đông có thể đạt cấp 11-12, giật cấp 13-14.</p><p>Theo ông Lâm, khi bão Trà Mi đi đến quần đảo Hoàng Sa, bão có xu hướng di chuyển chậm lại và cường độ suy yếu dần do có khối không khí lạnh di chuyển xuống đẩy bão đi lệch xuống phía Nam rồi di chuyển ra ngoài.</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/dl_1729875462_jpg\"></figure><p>Ông Lâm cho hay, bão duy trì tương đối lâu trong những ngày tới dẫn tới tình trạng khu vực giữa và Nam Biển Đông hình thành một dải hội tụ nhiệt đới gây mưa kéo dài ở Trung Bộ.</p><p>\"Cũng có những kịch bản ít khả năng xảy ra hơn đó là khi bão vào khu vực Hoàng Sa sẽ suy yếu đi nhưng bão vẫn di chuyển vào bờ và suy yếu trên đất liền Việt Nam. Kịch bản này có khả năng xảy ra thấp hơn (xác suất 30%) so với kịch bản bão trôi xuống phía Nam rồi đi ra phía ngoài biển (xác suất 60%)\", ông Lâm nói.</p><p>Theo ông Lâm, hai kịch bản ông quan tâm&nbsp;đến&nbsp;vấn đề mưa lớn ở Trung Trung Bộ, đây là nơi chịu ảnh hưởng lớn nhất của bão số 6.</p>', 'images/thumbnail/1729875475.jpg', '2024-10-25 09:57:55', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(41, 'Những món ăn đậm \"chất thu\" của Hà Nội', 12, '<h2><strong>VTV.vn - Những món ăn đậm \"chất thu\" của Hà Nội khiến ai đã từng một lần trải nghiệm đều khó có thể quên.</strong></h2><p><br><img src=\"http://127.0.0.1:8000/media/1_1730017619_png\"></p>', 'images/thumbnail/1730017627.jpg', '2024-10-27 08:27:07', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(42, 'Huế và Quảng Trị nhận kỷ vật của vua Hàm Nghi', 12, '<h2><strong>VTV.vn - Khay trà, tẩu thuốc và bộ sách chữ Hán được hậu duệ của vua Hàm Nghi trao tặng cho hai địa phương này.</strong></h2><ul><li>&nbsp;</li></ul><p>Khay và tẩu thuốc cùng chất liệu gỗ khảm ốc xà cừ. Chiếc khay dài hơn 31 cm, rộng hơn 18 cm và cao 10 cm. Bộ sách bằng chữ Hán có ba cuốn là&nbsp;Ngự chế canh chức đồ&nbsp;(hai chương),&nbsp;Đan đồ huyện chí&nbsp;(25 chương) và&nbsp;Tăng đính thi kinh thể chú diễn nghĩa&nbsp;(năm chương).</p><p>Các kỷ vật này được Tiến sĩ Amandine Dabat - hậu duệ đời thứ năm của vua Hàm Nghi - giao cho Đại sứ quán Việt Nam tại Paris và đại diện Bảo tàng Mỹ Thuật Việt Nam, ông Nguyễn Anh Minh mang về Việt Nam.</p><p>Trước đó vào tháng 12/2022, Thừa Thiên Huế đã&nbsp;đón nhận&nbsp;bức tranh vua Hàm Nghi vẽ lúc bị lưu đày ở Algérie - do hậu duệ đời thứ năm của ông trao tặng.</p><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/26/vua-73422168599115859778576.jpg\" alt=\"Huế và Quảng Trị nhận kỷ vật của vua Hàm Nghi - Ảnh 1.\"></figure><p>Lãnh đạo Bảo tàng Mỹ thuật Việt Nam trao lại kỷ vật của vua Hàm Nghi cho Giám đốc Trung tâm Bảo tồn Di tích Cố đô Huế</p><p>Ông Hoàng Việt Trung, Giám đốc Trung tâm Bảo tồn Di tích Cố đô Huế, cho biết, hoạt động tiếp nhận có ý nghĩa quan trọng đối với công tác bảo tồn di sản và khơi gợi, tôn vinh những giá trị lịch sử của dân tộc. Theo ông Trung, việc hồi hương các kỷ vật mang lại cơ hội để người dân trong nước, nhất là thế hệ trẻ được tìm hiểu thêm về vua Hàm Nghi.</p><p>Ngày 5/11 tới, Trung tâm Bảo tồn Di tích Cố đô Huế sẽ tổ chức tọa đàm ra mắt cuốn sách <i>Hàm nghi: Hoàng đế lưu vong - Nghệ sĩ ở Alger</i> của Tiến sĩ Amandine Dabat.</p><p>Vua Hàm Nghi&nbsp;sinh năm 1871, tên húy là Nguyễn Phúc Ưng Lịch. Ông lên ngôi năm 1884 khi mới 13 tuổi, là hoàng đế thứ tám của nhà Nguyễn. Năm 1885, sau khi kinh đô Huế thất thủ, vua Hàm Nghi cùng Tôn Thất Thuyết rời khỏi kinh thành. Ngày 13/7 cùng năm, tại thành Tân Sở ở Cam Lộ (Quảng Trị), vua ban chiếu Cần Vương, kêu gọi thần dân khắp ba miền chống Pháp. Năm 1888, vua bị bắt và bị Pháp đưa đi lưu đày ở Alger (thủ đô Algérie). Thời gian sống ở đây,&nbsp;tài năng&nbsp;hội họa của ông được khai phá. Nhà vua qua đời vào năm 1944 vì bệnh ung thư dạ dày.</p>', 'images/thumbnail/1730017773.jpg', '2024-10-27 08:29:33', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(43, 'Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương', 12, '<h2><strong>VTV.vn - Sở Du lịch tỉnh Ninh Bình vừa tổ chức khai mạc Lễ hội Khinh khí cầu Tràng An - Cúc Phương năm 2024 với chủ đề \"Tuyệt sắc miền Cố đô\".</strong></h2><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-khai-mac-07362019450832052667798.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 1.\"></figure><p>Đây là hoạt động trong chuỗi các hoạt động văn hóa, du lịch chào mừng kỷ niệm 10 năm Quần thể Danh thắng Tràng An được UNESCO ghi danh là Di sản văn hóa&nbsp;và thiên nhiên thế giới (2014 - 2024), Lễ hội Khinh khí cầu Tràng An - Cúc Phương năm 2024 được tổ chức nhằm tạo ra sản phẩm du lịch mới hiện đại, đặc sắc, độc đáo. Qua đó, góp phần đa dạng hóa sản phẩm du lịch, tạo sức hấp dẫn, thu hút đông đảo nhân dân, du khách trong nước và quốc tế. Lễ hội góp phần tăng cường quảng bá hình ảnh thương hiệu điểm đến du lịch, văn hóa, con người, tiềm năng, lợi thế phát triển Ninh Bình trở thành trung tâm du lịch quốc gia, quốc tế và là điểm đến của các lễ hội bốn mùa.</p><p>Theo ông Bùi Văn Mạnh, Giám đốc Sở Du lịch tỉnh Ninh Bình cho biết: Lễ hội có 35 khinh khí cầu và dù lượn, được điều khiển bởi phi công nước ngoài và thành viên Câu lạc bộ Dù lượn thành phố Hà Nội. Trong khuôn khổ Lễ hội sẽ diễn ra nhiều hoạt động như: Trình diễn ánh sáng khinh khí cầu, các chương trình nghệ thuật; trưng bày đặc sản OCOP các vùng miền...</p><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-khai-mac5-43902172721264852421705.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 2.\"></figure><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-khai-mac4-16206687196342183682156.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 3.\"></figure><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-khai-mac-65-00033441168142691043913.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 4.\"></figure><p>Các tiết mục văn hóa, văn nghệ đặc sắc được trình diễn tại Lễ khai mạc</p><p>Qua Lễ hội, Ban tổ chức mong muốn sẽ mang đến cho nhân dân, du khách những trải nghiệm ấn tượng, cảm giác thú vị, khó quên khi được ngắm nhìn từ trên cao không gian, cảnh quan tươi đẹp, hùng vĩ của Di sản văn hóa và thiên nhiên thế giới Tràng An; thành phố Hoa Lư - Đô thị di sản thiên niên kỷ trong tương lai. Du khách sẽ được hòa mình vào không gian sôi động của những bữa tiệc âm nhạc, nghệ thuật sôi động, hấp dẫn; đồng thời có những trải nghiệm, khám phá, tìm hiểu về các nét văn hóa&nbsp;đặc trưng của Ninh Bình; thưởng thức các món ẩm thực mang hương vị đặc sắc của vùng đất Cố Đô và tham quan, trải nghiệm các dịch vụ đẳng cấp tại những khu, điểm du lịch nổi tiếng của địa phương.</p><p>&nbsp;</p><p>Tỉnh Ninh Bình có tài nguyên du lịch đa dạng, phong phú và hấp dẫn. Trong những năm gần đây, hình ảnh, thương hiệu điểm đến du lịch Ninh Bình liên tục được quảng bá trên các phương tiện thông tin đại chúng và trên mạng xã hội. Đồng thời, hiệu quả kinh tế về du lịch tăng khá mạnh,&nbsp; riêng trong 10 tháng đầu năm 2024, du lịch Ninh Bình đã đón trên 7,68 triệu lượt khách, trong đó đón trên 978 nghìn lượt khách quốc tế. Doanh thu đạt hơn 7.773 tỷ đồng, tăng 40% so với cùng kỳ năm 2023.</p><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khach-du-lich--en-ninh-binh-sau-bao-so-37-29062962468020801380137.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 5.\"></figure><p>Ninh Bình đang vào mùa rất đẹp</p><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-67802119854116539181888.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 6.\"></figure><p>Lễ hội diễn ra đến hết ngày 29/10. Cũng theo Sở Du lịch tỉnh Ninh Bình, khi thời tiết tốt hơn, các hoạt động bay sẽ được Ban tổ chức thông báo sớm cho du khách và nhân dân đến tham gia trải nghiệm.</p>', 'images/thumbnail/1730018001.jpg', '2024-10-27 08:33:21', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản'),
(44, 'Test', 21, '<h2><i><strong>ABCDE</strong></i></h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/CoopTeam_3_1730139716_png\"></figure>', 'images/thumbnail/1730139721.jpg', '2024-10-28 18:22:01', 'Trần Hoàng Thọ', 17, 'Đang Biên Tập'),
(45, 'Test 29/10/2024', 22, '<h2><i><strong>Chứng khoán 29/10</strong></i></h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/Moon_1730141674_jpg\"></figure>', 'images/thumbnail/1730141679.jpg', '2024-10-28 18:54:39', 'Trần Hoàng Thọ', 17, 'Đã Xuất Bản');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bantinxuatban`
--

CREATE TABLE `bantinxuatban` (
  `MaBT_XB` int(11) NOT NULL,
  `TieuDeBT_XB` varchar(255) NOT NULL,
  `LoaiBT_XB` int(11) NOT NULL,
  `NoiDungBT_XB` longtext NOT NULL,
  `AnhDaiDien_XB` varchar(255) NOT NULL,
  `NgayXuatBan` timestamp NOT NULL DEFAULT current_timestamp(),
  `TenPhongVien_XB` varchar(255) NOT NULL,
  `TenBienTapVien_XB` varchar(255) NOT NULL,
  `TenKiemDuyetVien` varchar(255) NOT NULL,
  `MaKDV` int(11) NOT NULL,
  `MaBTHT_XB` int(11) NOT NULL,
  `MaBTBT_XB` int(11) NOT NULL,
  `LuotXem` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bantinxuatban`
--

INSERT INTO `bantinxuatban` (`MaBT_XB`, `TieuDeBT_XB`, `LoaiBT_XB`, `NoiDungBT_XB`, `AnhDaiDien_XB`, `NgayXuatBan`, `TenPhongVien_XB`, `TenBienTapVien_XB`, `TenKiemDuyetVien`, `MaKDV`, `MaBTHT_XB`, `MaBTBT_XB`, `LuotXem`) VALUES
(2, 'Test', 3, '<h2><i><strong>Ngày Giải phóng Thủ đô - Niềm hạnh phúc của cả dân tộc</strong></i></h2><p>Màn thực cảnh \"Ngày về chiến thắng\" tái hiện cuộc hành quân lịch sử vào Thủ đô Hà Nội ngày 10/10/1954. Đây là kết quả của trận quyết chiến chiến lược tại Điện Biên Phủ năm 1954, buộc Pháp phải ký Hiệp định Geneva công nhận độc lập, chủ quyền và toàn vẹn lãnh thổ Việt Nam</p>\n\n<p>Đi lại trên phố Hàng Đào, ông Dương Tự Minh vẫn vẹn nguyên cảm xúc của 70 năm trước.</p>\n\n<p>\"Người dân rất mừng rỡ vì bộ đội ta về giải phóng. Lúc đó, hạnh phúc nhất là khi ra đường không còn thấy cái bọn hiến binh, không sợ bị chặn lại để bắt lính\", ông Dương Tự Minh (Thành Đoàn Hà Nội - năm 1954) chia sẻ.</p>\n\n<p>\"Được Bác Hồ nói chuyện đây là về tiếp quản Thủ đô, quan trọng lắm. Chúng tôi mới thấy đây là một vinh dự lớn của Trung đoàn Thủ đô. Chiến đấu hy sinh 60 ngày đêm thì bây giờ chúng tôi là những người được hưởng cái vinh dự ấy\", ông Nguyễn Thụ (Trung đoàn Thủ đô, Đại đoàn 308 - năm 1954) cho biết.</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/172882999_1728059128_png\"></figure>', 'images/thumbnail/1728059132.png', '2024-10-07 03:35:34', 'Nguyễn Văn A', 'Nguyễn Văn D', 'Nguyễn Văn T', 20, 11, 19, 19),
(3, 'Test Phóng Viên 2.1', 5, '<h2><strong>VTV.vn - Câu lạc bộ tình nguyện của sinh viên tròn 14 tuổi vào ngày 5/9. Đó là hành trình dài nhiều nỗ lực của những bạn trẻ có tấm lòng hướng về cộng đồng.</strong></h2><p>Từ nhóm sinh viên tình nguyện cùng nhau hướng về cộng đồng năm 2010, đến nay câu lạc bộ Nét Bút Xanh đã có 14 năm phát triển với hàng loạt dự án thiện nguyện ý nghĩa cùng 60 thành viên chính thức tại TP Hồ Chí Minh, Bến Tre, Kiên Giang… Ngoài ra câu lạc bộ còn có các tình nguyện viên tham gia không chính thức tới hơn 200 người.</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/hinh-dep_1728447427_jpg\"></figure><p>Thuận lợi của câu lạc bộ Nét Bút Xanh là trực thuộc Trung tâm Tình nguyện Quốc gia (TW Đoàn Thanh niên Cộng sản Hồ Chí Minh) nên hoạt động dưới sự chỉ đạo, hướng dẫn của Trung tâm, cũng như Ban thường trực Mạng lưới Tình nguyện Quốc gia khu vực miền Nam. Do đó các hoạt động của câu lạc bộ luôn đúng tiêu chí, phương châm hoạt động của mình trên tinh thần tự nguyện, công khai minh bạch, đúng địa điểm, đúng đối tượng.</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/1673574526_hinh-nen-hoa-tulip-anvien_1728447453_jpg\"></figure><p>Câu lạc bộ duy trì hoạt động truyền thống, cùng với thực hiện các hoạt động mang tính bền vững như các dự án Nhà Hạnh Phúc hỗ trợ xây và sữa chữa những hoàn cảnh khó khăn về nhà ở, Xây cầu Hạnh Phúc xóa cầu tạm, cầu xuống cấp tại các tỉnh miền Tây; Vườn cây Hạnh Phúc tặng cây giống cho các hộ gia đình khó khăn có ít đất để gia đình chăm sóc và có nguồn thu nhập trong cuộc sống; dự án học bổng Chắp cánh ước mơ nhận đỡ đầu và hỗ trợ kinh phí học tập cho học sinh có hoàn cảnh khó khăn vươn lên trong học tập, và tiếp tục thực hiện dự án hỗ trợ cơm trưa cho học sinh lớp học tình thương Việt Nam - Campuchia tại Biển Hồ, Campuchia…</p><p>Sự phát triển từ nhóm sinh viên tự phát trở thành câu lạc bộ có quy mô hoạt động như hiện nay không chỉ có tấm lòng là đủ. Cách vận hành và quản lý luôn khoa học, rõ ràng, minh bạch là một trong những điều quan trọng giúp cho câu lạc bộ phát triển vững mạnh. Anh Trương Văn Vũ học chuyên ngành kế toán nên câu lạc bộ mở sổ sách thu – chi công khai, minh bạch trên trang web và các nền tảng mạng xã hội, ứng dụng ngân hàng… để các nhà hảo tâm có thể theo dõi trực tiếp quá trình kêu gọi đóng góp, chi phí các hoạt động. Tiêu chí của câu lạc bộ là không làm quỹ mà gói gọn chi phí trong một chương trình.</p>', 'images/thumbnail/1728447459.jpg', '2024-10-08 07:17:58', 'Nguyễn Phóng Viên', 'Trần Hoàng Thọ', 'Nguyễn Văn T', 20, 9, 25, 165),
(4, 'Bản Tin Test Phóng Viên 2', 4, '<h2><i><strong>ABCDEEEE</strong></i></h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/CoopTeam_1_1727788145_png\"></figure><p>&nbsp;</p>', 'images/thumbnail/1728409868.png', '2024-10-08 19:34:17', 'Nguyễn Văn A', 'Nguyễn Văn D', 'Nguyễn Văn T', 20, 5, 23, 42),
(5, 'ABC Biên Tập', 3, '<h2>123</h2><p><i><strong>ABCDE</strong></i></p>', 'images/thumbnail/1728065716.jpg', '2024-10-08 19:55:14', 'Nguyễn Văn A', 'Nguyễn Văn D', 'Nguyễn Văn T', 20, 13, 22, 37),
(6, 'Test 10/10/2024', 8, '<h2><i><strong>Test 10/10/2024</strong></i></h2><p>Test 10/10/2024</p><p>Test 10/10/2024</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/BTBT_BTXB.drawio (1)_1728542338_png\"></figure><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/BTBT_LT.drawio_1728542339_png\"></figure><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/BTHT_BTBT.drawio_1728542339_png\"></figure><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/BTHT_LT.drawio_1728542339_png\"></figure>', 'images/thumbnail/1728542354.png', '2024-10-09 16:50:50', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 23, 26, 19),
(7, 'Bản Tin Test Phóng Viên 1', 3, '<h2>ABCDE</h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/Moon_1727788088_jpg\"></figure>', 'images/thumbnail/1727788095.jpg', '2024-10-10 16:32:02', 'Nguyễn Phóng Viên', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 4, 27, 14),
(8, 'Kinh tế 1', 3, '<p>Kinh tế 1 Kinh tế 1 <img src=\"http://127.0.0.1:8000/media/1727787354_1729440482_jpg\">Kinh tế 1</p>', 'images/thumbnail/1729440488.jpg', '2024-10-20 09:12:33', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 24, 38, 1),
(9, 'Kinh tế 2', 3, '<p>Kinh tế 1Kinh tế 1Kinh tế 1</p>', 'images/thumbnail/1729440504.jpg', '2024-10-20 09:12:36', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 25, 37, 0),
(10, 'Quốc tế 1', 4, '<p>Quốc tế 1Quốc tế 1</p>', 'images/thumbnail/1729440529.jpg', '2024-10-20 09:12:40', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 26, 36, 2),
(11, 'Quốc tế 2', 3, '<p>Quốc tế 1Quốc tế 1</p>', 'images/thumbnail/1729440541.jpg', '2024-10-20 09:12:43', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 27, 35, 1),
(12, 'Quân sự 1', 5, '<p>Quân sự 1Quân sự 1Quân sự 1</p>', 'images/thumbnail/1729440559.jpg', '2024-10-20 09:12:46', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 28, 34, 2),
(13, 'Quân sự 2', 3, '<p>Quân sự 2Quân sự 2Quân sự 2</p>', 'images/thumbnail/1729440578.jpg', '2024-10-20 09:12:49', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 29, 33, 3),
(14, 'Âm Nhạc 1', 8, '<p>Âm Nhạc 1Âm Nhạc 1Âm Nhạc 1</p>', 'images/thumbnail/1729440599.jpg', '2024-10-20 09:12:52', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 30, 32, 0),
(15, 'Âm Nhạc 2', 8, '<p>Âm Nhạc 2Âm Nhạc 2Âm Nhạc 2</p>', 'images/thumbnail/1729440619.jpg', '2024-10-20 09:12:55', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 31, 31, 1),
(16, 'Âm Nhạc 1', 8, '<p>Âm Nhạc 2Âm Nhạc 2Âm Nhạc 2Âm Nhạc 2</p>', 'images/thumbnail/1729440641.jpg', '2024-10-20 09:13:06', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 32, 30, 2),
(17, 'Trong Nước 1', 11, '<p>Trong Nước 1Trong Nước 1Trong Nước 1</p>', 'images/thumbnail/1729440660.jpg', '2024-10-20 09:13:09', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 33, 29, 1),
(18, 'Trong Nước 2', 3, '<p>Trong Nước 2Trong Nước 2Trong Nước 2Trong Nước 2</p>', 'images/thumbnail/1729440673.jpg', '2024-10-20 09:13:12', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 34, 28, 0),
(19, 'Bản Tin Thứ 2 Test Phóng Viên 1', 3, '<h2><i><strong>ABCDE</strong></i></h2><p>áhdjkhajshdjhajhwuhjkahsjkhduiqawhjahjkdas</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/CoopTeam_1_1727789758_png\"></figure><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/CoopTeam_2_1727969212_png\"></figure>', 'images/thumbnail/1727789762.jpg', '2024-10-20 09:13:16', 'Nguyễn Phóng Viên', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 6, 24, 14),
(20, 'Trong Nước 22', 11, '<p>Trong Nước 22Trong Nước 22Trong Nước 22</p>', 'images/thumbnail/1729441048.jpg', '2024-10-20 09:18:12', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 35, 40, 2),
(21, 'Trong Nước 222', 11, '<p>Trong Nước 222Trong Nước 222Trong Nước 222</p>', 'images/thumbnail/1729441065.jpg', '2024-10-20 09:18:15', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 36, 39, 4),
(22, 'Trong Nước 222', 11, '<h2><strong>VTV.vn- Temu đã có văn bản chính thức gửi Cục Thương mại điện tử và Kinh tế số về việc thực hiện các yêu cầu tuân thủ pháp luật thương mại điện tử Việt Nam khi gia nhập thị trường.</strong></h2><p>Thông tin từ Cục Thương mại điện tử và Kinh tế số (Bộ Công Thương), Temu là nền tảng thương mại điện tử xuyên biên giới có ngôn ngữ thể hiện tiếng Việt và thuộc phạm vi điều chỉnh của Nghị định số 52/2013 ngày 16/5/2013 của Chính phủ về thương mại điện tử (được sửa đổi, bổ sung bởi Nghị định số 85/2021).<br>&nbsp;</p><p>Ngày 24/10, Temu đã có văn bản chính thức gửi Cục Thương mại điện tử và Kinh tế số về việc thực hiện các yêu cầu tuân thủ pháp luật thương mại điện tử Việt Nam khi gia nhập thị trường.</p><p>Theo Cục Thương mại điện tử và Kinh tế số, Việt Nam là một trong những quốc gia có tốc độ phát triển thương mại điện tử trung bình 25%/năm, thuộc top đầu so với các quốc gia khác ở Đông Nam Á.</p><p>Thị trường bán lẻ thương mại điện tử ước đạt 20,5 tỷ USD năm 2023, số lượng người tiêu dùng mua sắm trực tuyến hiện đang vượt ngưỡng 61 triệu người và giá trị mua sắm trực tuyến của một người vào khoảng 336 USD.</p>', 'images/thumbnail/1729778501.jpg', '2024-10-24 07:02:06', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 37, 41, 9),
(23, 'Hhh hhh hhh hh hhhhh hhhh hhhh hhhhh hh hhh hhh hhhh hhhhh hh hhh hhhh hhh', 3, '<p>hhhhhhhhhhhhhhhhhhhh</p>', 'images/thumbnail/1729860850.jpg', '2024-10-25 05:54:29', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 38, 42, 5),
(25, 'Bão Trà Mi còn mạnh lên, gây mưa rất to và lũ quét ở miền Trung.', 11, '<h2><i><strong>(Dân trí) - Dự báo khi di chuyển đến quần đảo Hoàng Sa, bão Trà Mi di chuyển chậm lại và cường độ suy yếu dần do có khối không khí lạnh di chuyển xuống đẩy bão đi lệch xuống phía Nam rồi di chuyển ra ngoài.</strong></i></h2><p>Chiều 25/10, ông Hoàng Phúc Lâm, Phó Giám đốc Trung tâm Dự báo Khí tượng Thủy văn Quốc gia cho biết, bão Trà Mi (bão số 6) đang hướng về quần đảo Hoàng Sa với tốc độ khá nhanh khoảng 15-20km/h.</p><p>Dự báo trong khoảng 24 đến 48 giờ tới, bão di chuyển tương đối ổn định và cường độ còn mạnh lên. Cường độ cực đại trên Biển Đông có thể đạt cấp 11-12, giật cấp 13-14.</p><p>Theo ông Lâm, khi bão Trà Mi đi đến quần đảo Hoàng Sa, bão có xu hướng di chuyển chậm lại và cường độ suy yếu dần do có khối không khí lạnh di chuyển xuống đẩy bão đi lệch xuống phía Nam rồi di chuyển ra ngoài.</p><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/dl_1729875462_jpg\"></figure><p>Ông Lâm cho hay, bão duy trì tương đối lâu trong những ngày tới dẫn tới tình trạng khu vực giữa và Nam Biển Đông hình thành một dải hội tụ nhiệt đới gây mưa kéo dài ở Trung Bộ.</p><p>\"Cũng có những kịch bản ít khả năng xảy ra hơn đó là khi bão vào khu vực Hoàng Sa sẽ suy yếu đi nhưng bão vẫn di chuyển vào bờ và suy yếu trên đất liền Việt Nam. Kịch bản này có khả năng xảy ra thấp hơn (xác suất 30%) so với kịch bản bão trôi xuống phía Nam rồi đi ra phía ngoài biển (xác suất 60%)\", ông Lâm nói.</p><p>Theo ông Lâm, hai kịch bản ông quan tâm&nbsp;đến&nbsp;vấn đề mưa lớn ở Trung Trung Bộ, đây là nơi chịu ảnh hưởng lớn nhất của bão số 6.</p>', 'images/thumbnail/1729875475.jpg', '2024-10-25 09:58:10', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 40, 44, 7),
(26, 'Những món ăn đậm \"chất thu\" của Hà Nội', 12, '<h2><strong>VTV.vn - Những món ăn đậm \"chất thu\" của Hà Nội khiến ai đã từng một lần trải nghiệm đều khó có thể quên.</strong></h2><p><br><img src=\"http://127.0.0.1:8000/media/1_1730017619_png\"></p>', 'images/thumbnail/1730017627.jpg', '2024-10-27 08:27:51', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 41, 45, 1),
(27, 'Huế và Quảng Trị nhận kỷ vật của vua Hàm Nghi', 12, '<h2><strong>VTV.vn - Khay trà, tẩu thuốc và bộ sách chữ Hán được hậu duệ của vua Hàm Nghi trao tặng cho hai địa phương này.</strong></h2><ul><li>&nbsp;</li></ul><p>Khay và tẩu thuốc cùng chất liệu gỗ khảm ốc xà cừ. Chiếc khay dài hơn 31 cm, rộng hơn 18 cm và cao 10 cm. Bộ sách bằng chữ Hán có ba cuốn là&nbsp;Ngự chế canh chức đồ&nbsp;(hai chương),&nbsp;Đan đồ huyện chí&nbsp;(25 chương) và&nbsp;Tăng đính thi kinh thể chú diễn nghĩa&nbsp;(năm chương).</p><p>Các kỷ vật này được Tiến sĩ Amandine Dabat - hậu duệ đời thứ năm của vua Hàm Nghi - giao cho Đại sứ quán Việt Nam tại Paris và đại diện Bảo tàng Mỹ Thuật Việt Nam, ông Nguyễn Anh Minh mang về Việt Nam.</p><p>Trước đó vào tháng 12/2022, Thừa Thiên Huế đã&nbsp;đón nhận&nbsp;bức tranh vua Hàm Nghi vẽ lúc bị lưu đày ở Algérie - do hậu duệ đời thứ năm của ông trao tặng.</p><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/26/vua-73422168599115859778576.jpg\" alt=\"Huế và Quảng Trị nhận kỷ vật của vua Hàm Nghi - Ảnh 1.\"></figure><p>Lãnh đạo Bảo tàng Mỹ thuật Việt Nam trao lại kỷ vật của vua Hàm Nghi cho Giám đốc Trung tâm Bảo tồn Di tích Cố đô Huế</p><p>Ông Hoàng Việt Trung, Giám đốc Trung tâm Bảo tồn Di tích Cố đô Huế, cho biết, hoạt động tiếp nhận có ý nghĩa quan trọng đối với công tác bảo tồn di sản và khơi gợi, tôn vinh những giá trị lịch sử của dân tộc. Theo ông Trung, việc hồi hương các kỷ vật mang lại cơ hội để người dân trong nước, nhất là thế hệ trẻ được tìm hiểu thêm về vua Hàm Nghi.</p><p>Ngày 5/11 tới, Trung tâm Bảo tồn Di tích Cố đô Huế sẽ tổ chức tọa đàm ra mắt cuốn sách <i>Hàm nghi: Hoàng đế lưu vong - Nghệ sĩ ở Alger</i> của Tiến sĩ Amandine Dabat.</p><p>Vua Hàm Nghi&nbsp;sinh năm 1871, tên húy là Nguyễn Phúc Ưng Lịch. Ông lên ngôi năm 1884 khi mới 13 tuổi, là hoàng đế thứ tám của nhà Nguyễn. Năm 1885, sau khi kinh đô Huế thất thủ, vua Hàm Nghi cùng Tôn Thất Thuyết rời khỏi kinh thành. Ngày 13/7 cùng năm, tại thành Tân Sở ở Cam Lộ (Quảng Trị), vua ban chiếu Cần Vương, kêu gọi thần dân khắp ba miền chống Pháp. Năm 1888, vua bị bắt và bị Pháp đưa đi lưu đày ở Alger (thủ đô Algérie). Thời gian sống ở đây,&nbsp;tài năng&nbsp;hội họa của ông được khai phá. Nhà vua qua đời vào năm 1944 vì bệnh ung thư dạ dày.</p>', 'images/thumbnail/1730017773.jpg', '2024-10-27 08:29:53', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 42, 46, 0),
(28, 'Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương', 12, '<h2><strong>VTV.vn - Sở Du lịch tỉnh Ninh Bình vừa tổ chức khai mạc Lễ hội Khinh khí cầu Tràng An - Cúc Phương năm 2024 với chủ đề \"Tuyệt sắc miền Cố đô\".</strong></h2><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-khai-mac-07362019450832052667798.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 1.\"></figure><p>Đây là hoạt động trong chuỗi các hoạt động văn hóa, du lịch chào mừng kỷ niệm 10 năm Quần thể Danh thắng Tràng An được UNESCO ghi danh là Di sản văn hóa&nbsp;và thiên nhiên thế giới (2014 - 2024), Lễ hội Khinh khí cầu Tràng An - Cúc Phương năm 2024 được tổ chức nhằm tạo ra sản phẩm du lịch mới hiện đại, đặc sắc, độc đáo. Qua đó, góp phần đa dạng hóa sản phẩm du lịch, tạo sức hấp dẫn, thu hút đông đảo nhân dân, du khách trong nước và quốc tế. Lễ hội góp phần tăng cường quảng bá hình ảnh thương hiệu điểm đến du lịch, văn hóa, con người, tiềm năng, lợi thế phát triển Ninh Bình trở thành trung tâm du lịch quốc gia, quốc tế và là điểm đến của các lễ hội bốn mùa.</p><p>Theo ông Bùi Văn Mạnh, Giám đốc Sở Du lịch tỉnh Ninh Bình cho biết: Lễ hội có 35 khinh khí cầu và dù lượn, được điều khiển bởi phi công nước ngoài và thành viên Câu lạc bộ Dù lượn thành phố Hà Nội. Trong khuôn khổ Lễ hội sẽ diễn ra nhiều hoạt động như: Trình diễn ánh sáng khinh khí cầu, các chương trình nghệ thuật; trưng bày đặc sản OCOP các vùng miền...</p><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-khai-mac5-43902172721264852421705.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 2.\"></figure><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-khai-mac4-16206687196342183682156.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 3.\"></figure><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-khai-mac-65-00033441168142691043913.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 4.\"></figure><p>Các tiết mục văn hóa, văn nghệ đặc sắc được trình diễn tại Lễ khai mạc</p><p>Qua Lễ hội, Ban tổ chức mong muốn sẽ mang đến cho nhân dân, du khách những trải nghiệm ấn tượng, cảm giác thú vị, khó quên khi được ngắm nhìn từ trên cao không gian, cảnh quan tươi đẹp, hùng vĩ của Di sản văn hóa và thiên nhiên thế giới Tràng An; thành phố Hoa Lư - Đô thị di sản thiên niên kỷ trong tương lai. Du khách sẽ được hòa mình vào không gian sôi động của những bữa tiệc âm nhạc, nghệ thuật sôi động, hấp dẫn; đồng thời có những trải nghiệm, khám phá, tìm hiểu về các nét văn hóa&nbsp;đặc trưng của Ninh Bình; thưởng thức các món ẩm thực mang hương vị đặc sắc của vùng đất Cố Đô và tham quan, trải nghiệm các dịch vụ đẳng cấp tại những khu, điểm du lịch nổi tiếng của địa phương.</p><p>&nbsp;</p><p>Tỉnh Ninh Bình có tài nguyên du lịch đa dạng, phong phú và hấp dẫn. Trong những năm gần đây, hình ảnh, thương hiệu điểm đến du lịch Ninh Bình liên tục được quảng bá trên các phương tiện thông tin đại chúng và trên mạng xã hội. Đồng thời, hiệu quả kinh tế về du lịch tăng khá mạnh,&nbsp; riêng trong 10 tháng đầu năm 2024, du lịch Ninh Bình đã đón trên 7,68 triệu lượt khách, trong đó đón trên 978 nghìn lượt khách quốc tế. Doanh thu đạt hơn 7.773 tỷ đồng, tăng 40% so với cùng kỳ năm 2023.</p><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khach-du-lich--en-ninh-binh-sau-bao-so-37-29062962468020801380137.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 5.\"></figure><p>Ninh Bình đang vào mùa rất đẹp</p><figure class=\"image\"><img src=\"https://cdn-images.vtv.vn/thumb_w/640/66349b6076cb4dee98746cf1/2024/10/27/khinh-khi-cau-ninh-binh-67802119854116539181888.jpg\" alt=\"Sôi động Lễ hội khinh khí cầu Tràng An - Cúc Phương - Ảnh 6.\"></figure><p>Lễ hội diễn ra đến hết ngày 29/10. Cũng theo Sở Du lịch tỉnh Ninh Bình, khi thời tiết tốt hơn, các hoạt động bay sẽ được Ban tổ chức thông báo sớm cho du khách và nhân dân đến tham gia trải nghiệm.</p>', 'images/thumbnail/1730018001.jpg', '2024-10-27 08:33:46', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 43, 47, 0),
(29, 'Test 29/10/2024', 22, '<h2><i><strong>Chứng khoán 29/10/2024 Update</strong></i></h2><figure class=\"image\"><img src=\"http://127.0.0.1:8000/media/Moon_1730141674_jpg\"></figure>', 'images/thumbnail/1730141679.jpg', '2024-10-28 19:01:43', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 'Trần Hoàng Thọ', 17, 45, 50, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bophan`
--

CREATE TABLE `bophan` (
  `MaBP` int(11) NOT NULL,
  `TenBP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `bophan`
--

INSERT INTO `bophan` (`MaBP`, `TenBP`) VALUES
(1, 'Quản Lý'),
(2, 'Nhân Sự'),
(5, 'Test 1'),
(8, 'Test 2'),
(12, 'Quản Trị Hệ Thống'),
(13, 'Test 3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `MaCV` int(11) NOT NULL,
  `TenChucVu` varchar(255) NOT NULL,
  `MaBP_CV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`MaCV`, `TenChucVu`, `MaBP_CV`) VALUES
(1, 'Quản Lý', 1),
(2, 'Phóng Viên', 2),
(3, 'Biên Tập Viên', 2),
(4, 'Kiểm Duyệt Viên', 2),
(5, 'Chức Vụ Test', 5),
(6, 'Chức Vụ Test 2', 8),
(9, 'Admin', 12),
(10, 'Chức Vụ Test 3', 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuyenmuc`
--

CREATE TABLE `chuyenmuc` (
  `MaCM` int(11) NOT NULL,
  `TenCM` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chuyenmuc`
--

INSERT INTO `chuyenmuc` (`MaCM`, `TenCM`) VALUES
(1, 'Thể thao'),
(2, 'Giải trí'),
(3, 'Thế giới'),
(4, 'Xã hội'),
(5, 'Kinh doanh'),
(6, 'Khoa học - Tự nhiên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `MaBT_XB` int(11) UNSIGNED NOT NULL,
  `MaTK_DG` bigint(20) UNSIGNED NOT NULL,
  `NoiDung` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `TrangThai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `MaBT_XB`, `MaTK_DG`, `NoiDung`, `created_at`, `updated_at`, `TrangThai`) VALUES
(3, 5, 60, 'Xin chao, toi la doc gia 1', '2024-10-09 16:04:46', '2024-10-09 16:04:46', 'Đã Kiểm Duyệt'),
(4, 3, 60, 'Xin chào', '2024-10-09 16:05:15', '2024-10-09 16:05:15', 'Đã Kiểm Duyệt'),
(5, 3, 61, 'Tôi là độc giả 2', '2024-10-09 16:05:50', '2024-10-09 16:05:50', 'Đã Kiểm Duyệt'),
(6, 4, 63, 'Test Bình Luận', '2024-10-09 16:14:41', '2024-10-09 16:14:41', 'Đã Kiểm Duyệt'),
(7, 2, 63, 'Bình luận đầu tiên', '2024-10-09 16:19:48', '2024-10-09 16:19:48', 'Đã Kiểm Duyệt'),
(8, 2, 63, 'Bình luận thứ 2', '2024-10-09 16:20:49', '2024-10-09 16:20:49', 'Đã Kiểm Duyệt'),
(9, 3, 60, 'Test bình luận 10/10', '2024-10-09 16:25:02', '2024-10-09 16:25:02', 'Đã Kiểm Duyệt'),
(10, 5, 65, 'Tôi là độc giả 5', '2024-10-09 16:49:16', '2024-10-09 16:49:16', 'Đã Kiểm Duyệt'),
(11, 6, 25, 'Hello', '2024-10-09 16:51:07', '2024-10-09 16:51:07', 'Đã Kiểm Duyệt'),
(12, 6, 60, 'Hello', '2024-10-09 16:51:47', '2024-10-09 16:51:47', 'Đã Kiểm Duyệt'),
(13, 6, 1, 'admin', '2024-10-09 16:52:48', '2024-10-09 16:52:48', 'Đã Kiểm Duyệt'),
(14, 6, 60, 'Hello World', '2024-10-10 00:02:27', '2024-10-25 11:25:48', 'Đã Kiểm Duyệt'),
(15, 3, 25, 'Hello', '2024-10-10 15:42:01', '2024-10-10 15:42:01', 'Đã Kiểm Duyệt'),
(16, 6, 25, 'Hello', '2024-10-10 16:11:11', '2024-10-10 16:11:11', 'Đã Kiểm Duyệt'),
(17, 6, 25, 'ABC', '2024-10-10 16:11:18', '2024-10-10 16:11:18', 'Đã Kiểm Duyệt'),
(18, 3, 60, '111', '2024-10-20 18:43:07', '2024-10-25 11:14:48', 'Đã Kiểm Duyệt'),
(19, 3, 60, 'abc', '2024-10-25 09:42:12', '2024-10-25 11:14:37', 'Đã Kiểm Duyệt'),
(20, 3, 60, 'hay', '2024-10-26 17:14:16', '2024-10-26 17:14:16', 'Chờ Kiểm Duyệt'),
(21, 3, 61, 'Xin chao', '2024-10-26 17:20:30', '2024-10-26 17:20:30', 'Chờ Kiểm Duyệt'),
(22, 19, 25, 'abc', '2024-10-26 17:29:05', '2024-10-26 17:29:11', 'Đã Kiểm Duyệt'),
(23, 3, 60, 'abc', '2024-10-28 16:47:22', '2024-10-28 16:47:22', 'Chờ Kiểm Duyệt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `docgia`
--

CREATE TABLE `docgia` (
  `MaDG` int(11) NOT NULL,
  `TenDG` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `SDT` varchar(20) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `GioiTinh` varchar(255) NOT NULL,
  `MaTK_DG` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `docgia`
--

INSERT INTO `docgia` (`MaDG`, `TenDG`, `Email`, `NgaySinh`, `SDT`, `DiaChi`, `GioiTinh`, `MaTK_DG`) VALUES
(6, 'Doc Gia 1', 'docgia1@gmail.com', '2002-05-05', '0123456789', 'Hai Phong', 'Nam', 60),
(7, 'Doc Gia 2', 'docgia2@gmail.com', '2002-05-05', '0123456789', 'Ha Noi', 'Nam', 61),
(9, 'Doc Gia 3', 'tho3@st.vimaru.edu.vn', '2002-05-05', '0987654321', 'Hai Phong', 'Nữ', 63),
(10, 'Doc Gia 4', 'tho4@st.vimaru.edu.vn', '2002-05-05', '0997765512', 'Hai Phong', 'Nam', 64),
(11, 'Doc Gia 5', 'docgia5@gmail.com', '2002-05-05', '9890890789', 'Hai Phong', 'Nam', 65),
(12, 'Doc Gia 6', 'docgia6@gmail.com', '2002-05-05', '1827389172', 'Hai Phong', 'Nam', 69);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

CREATE TABLE `loaitin` (
  `MaLT` int(11) NOT NULL,
  `TenLT` varchar(255) NOT NULL,
  `MaCM_LT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitin`
--

INSERT INTO `loaitin` (`MaLT`, `TenLT`, `MaCM_LT`) VALUES
(3, 'Bóng đá', 1),
(4, 'Tenis', 1),
(5, 'Bóng rổ', 1),
(8, 'Golf', 1),
(11, 'Võ thuật', 1),
(12, 'Điện Ảnh', 2),
(13, 'Âm Nhạc', 2),
(14, 'Thời trang', 2),
(15, 'Mỹ thuật', 2),
(16, 'Thế giới đó đây', 3),
(17, 'Kiều báo', 3),
(18, 'Chiến sự thế giới', 3),
(19, 'Chính trị', 4),
(20, 'Môi trường', 4),
(21, 'Tài chính', 5),
(22, 'Chứng khoán', 5),
(23, 'Doanh nghiệp', 5),
(25, 'Giới trẻ', 4),
(26, 'Thế giới tự nhiên', 6),
(27, 'Vũ trụ', 6),
(28, 'Khoa học & Đời sống', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nentang`
--

CREATE TABLE `nentang` (
  `MaNT` int(11) NOT NULL,
  `TenNenTang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nentang`
--

INSERT INTO `nentang` (`MaNT`, `TenNenTang`) VALUES
(1, 'Web'),
(2, 'Facebook'),
(4, 'Báo Giấy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `TenNV` varchar(255) NOT NULL,
  `MaCV_NV` int(11) NOT NULL,
  `DiaChi_NV` varchar(255) NOT NULL,
  `SoDT_NV` varchar(255) NOT NULL,
  `NgaySinh_NV` date NOT NULL,
  `Email_NV` varchar(255) NOT NULL,
  `CCCD_NV` varchar(255) NOT NULL,
  `GioiTinh_NV` varchar(255) NOT NULL,
  `Anh_NV` varchar(255) NOT NULL,
  `MaTK_NV` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `MaCV_NV`, `DiaChi_NV`, `SoDT_NV`, `NgaySinh_NV`, `Email_NV`, `CCCD_NV`, `GioiTinh_NV`, `Anh_NV`, `MaTK_NV`) VALUES
(17, 'Trần Hoàng Thọ', 1, 'Hải Phòng', '9182903901', '2002-01-01', 'ql1@gmail.com', '8172893781728', 'Nam', 'images/nhanvien/1727760420_172882999.png', 25),
(18, 'Nguyễn Phóng Viên', 2, 'Hải Phòng', '9182390182', '2002-01-01', 'phongvien1@gmail.com', '8172837891728', 'Nam', 'images/nhanvien/1727720562_CoopTeam_3.png', 26),
(19, 'Nguyễn Văn D', 3, 'Hải Phòng', '1027308128', '2002-01-01', 'test123333@gmail.com', '8712893798172', 'Nam', 'images/nhanvien/1727543062_CoopTeam_1.png', 27),
(20, 'Nguyễn Văn T', 4, 'Hải Phòng', '7128737182', '2002-01-01', 'kd1@gmail.com', '8718927387198', 'Nam', 'images/nhanvien/1727543114_172882999.png', 28),
(21, 'Nguyễn Văn A', 3, 'Hải Phòng', '8712893781', '2002-01-01', 'test@gmail.com', '8917298371872', 'Nữ', 'images/nhanvien/1727543077_CoopTeam_3.png', 29),
(22, 'Nguyễn Văn A', 4, 'Hải Phòng', '1827398172', '2002-01-01', '111btv1212@gmail.com', '8712893789172', 'Nam', 'images/nhanvien/1727543089_172882999.png', 30),
(23, 'Nguyễn Văn A', 2, 'Hải Phòng', '9890809182', '2002-01-01', '1212kdv1@gmail.com', '7812837918273', 'Nữ', 'images/nhanvien/1727543051_CoopTeam_3.png', 31),
(24, 'Nguyễn Văn A', 4, 'Hải Phòng', '8172378172', '2002-05-05', 'kdv1add@gmail.com', '8917289378172', 'Nữ', 'images/nhanvien/1727369872_172882999.png', 32),
(25, 'Nguyễn Văn A', 1, 'Hải Phòng', '8907129873', '2002-01-01', 'btv564@gmail.com', '8712983719827', 'Nam', 'images/nhanvien/1727543012_CoopTeam_1.png', 33),
(26, 'Trần Văn Test 1', 1, 'Hà Nội', '9823908109', '2002-01-01', 'btv12312@gmail.com', '5878972873479', 'Nữ', 'images/nhanvien/1727543027_CoopTeam_2.png', 34),
(27, 'Quản Lý Test', 5, 'Hải Phòng', '8172938718', '2002-01-01', 'testquanly@gmail.com', '7129837891729', 'Nữ', 'images/nhanvien/1727432642_CoopTeam_3.png', 35),
(28, 'Nguyễn Test', 5, 'Hải Phòng', '1231234121212', '2002-01-01', 'kdv222@gmail.com', '121212121212', 'Nam', 'images/nhanvien/1727451346_CoopTeam_2.png', 36),
(29, 'Nguyễn Văn A', 5, 'Hải Phòng', '1231234121212', '2002-01-01', '2btv2@gmail.com', '121212121212', 'Nam', 'images/nhanvien/1727458864_172882999.png', 38),
(30, 'Trần Văn D', 6, 'Hải Phòng', '1231234121212', '2002-01-01', 'btvte@gmail.com', '121212121212', 'Nam', 'images/nhanvien/1727495546_Moon.jpg', 39),
(31, 'Nguyễn Thế Vinh', 6, 'Đồng Nai', '012356455', '2002-03-03', 'test1231111112@gmail.com', '01010101011111', 'Nam', 'images/nhanvien/1727542852_CoopTeam_2.png', 40),
(32, 'Nguyễn Văn Test', 5, 'Hải Phòng', '1231234121212', '2002-01-01', 'btv1dadasd2312@gmail.com', '121212121212', 'Nữ', 'images/nhanvien/1727543394_172882999.png', 41),
(33, 'Lần Cuối', 10, 'Hải Dương', '09898888', '2002-02-02', 'btvaaaa@gmail.com', '8181727127', 'Nữ', 'images/nhanvien/1727544845_CoopTeam_1.png', 42),
(34, 'Nguyễn Văn A', 3, 'Hải Phòng', '1231234121212', '2002-01-01', 'testtest@gmail.com', '121212121212', 'Nam', 'images/nhanvien/1727611666_Moon.jpg', 43),
(35, 'Nguyễn Văn A', 4, 'Hải Phòng', '1231234121212', '2002-02-02', 'testtest123333@gmail.com', '0101010101', 'Nữ', 'images/nhanvien/1727611897_CoopTeam_1.png', 44),
(41, 'Nguyễn Văn A', 9, 'Hải Phòng', '8172983781', '2002-05-05', 'admin@gmail.com', '1872890379817', 'Nữ', 'images/nhanvien/1727719421_CoopTeam_3.png', 50),
(42, 'Nguyễn Văn A', 10, 'Hà Nội', '9878978127', '2002-05-05', 'btv12@gmail.com', '8888888888888', 'Nam', 'images/nhanvien/1727719899_CoopTeam_3.png', 51),
(43, 'Trần Hoàng Thọ', 5, 'Hải Phòng', '7182371298', '2002-01-01', 'ql12@gmail.com', '8172893798123', 'Nam', 'images/nhanvien/1727760051_CoopTeam_1.png', 52),
(44, 'Nguyễn Văn VB', 5, 'Hải Phòng', '8789798789', '2002-05-05', 'test0510@gmail.com', '8172893791872', 'Nam', 'images/nhanvien/1728065639_CoopTeam_2.png', 53),
(45, 'Nguyễn Văn A', 9, 'Hải Phòng', '9081728937', '2002-05-05', 'adtest@gmail.com', '8172893719827', 'Nữ', 'images/nhanvien/1729876620_CoopTeam_3.png', 66),
(46, 'Nguyễn Văn A', 9, 'Hải Phòng', '9128390810', '2002-05-05', 'ad4@gmail.com', '9012839081092', 'Nam', 'images/nhanvien/1729877823_Moon.jpg', 67),
(47, 'Nguyễn Admin', 9, 'Hải Phòng', '9821908903', '2002-05-05', 'admin@gmail.cok', '8172389712983', 'Nam', 'images/nhanvien/1729878086_172882999.png', 68);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhuanbut`
--

CREATE TABLE `nhuanbut` (
  `MaNB` int(11) NOT NULL,
  `MaBT_XB` int(11) NOT NULL,
  `NgayThanhToan` date DEFAULT NULL,
  `TinhTrangThanhToan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhuanbut`
--

INSERT INTO `nhuanbut` (`MaNB`, `MaBT_XB`, `NgayThanhToan`, `TinhTrangThanhToan`) VALUES
(1, 2, '2024-10-12', 'Đã Thanh Toán'),
(2, 3, '2024-10-13', 'Đã Thanh Toán'),
(3, 4, '2024-10-12', 'Đã Thanh Toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanquyen`
--

CREATE TABLE `phanquyen` (
  `id` int(11) NOT NULL,
  `ChucVu_PhanQuyen` int(11) NOT NULL,
  `MaQuyen_PhanQuyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phanquyen`
--

INSERT INTO `phanquyen` (`id`, `ChucVu_PhanQuyen`, `MaQuyen_PhanQuyen`) VALUES
(1, 1, 4),
(24, 1, 3),
(25, 1, 1),
(26, 1, 2),
(28, 2, 2),
(33, 3, 3),
(34, 4, 4),
(39, 5, 1),
(40, 6, 5),
(46, 1, 5),
(47, 1, 6),
(48, 6, 2),
(60, 1, 7),
(62, 5, 2),
(63, 10, 1),
(68, 10, 8),
(70, 1, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `MaQuyen` int(11) NOT NULL,
  `TenQuyen` varchar(255) NOT NULL,
  `ChuThich` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`MaQuyen`, `TenQuyen`, `ChuThich`) VALUES
(1, 'Quản Lý Nhân Viên', 'Quản lý danh sách nhân viên'),
(2, 'Đăng Tải Bản Tin Hiện Trường', 'Đăng tải và lưu bản tin hiện trường'),
(3, 'Biên Soạn', 'Biên soạn bản tin'),
(4, 'Kiểm Duyệt', 'Kiểm duyệt và xuất bản bản tin'),
(5, 'Quản Lý Danh Mục', 'Quản lý các danh mục'),
(6, 'Quản Lý Nhuận Bút', 'Quản lý nhuận bút nhân viên'),
(7, 'Theo Dõi Hiệu Suất', 'Theo dõi hiệu suất nhân viên'),
(8, 'Kiểm Duyệt Bình Luận', 'Kiểm duyệt bình luận của độc giả');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('t28RH4zLjM0zOqDf1U5XQRtO5I2BYzEAC1ghFAmL', 25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVzZwc3U2UndFcHdZRU5MTVJFZzNFQk9oNDc1NUUySTNTTjNZYmRxUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9xdWFubHkvbG9haXRpbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI1O30=', 1730142407);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `TenDangNhap` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `Quyen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `TenDangNhap`, `MatKhau`, `Quyen`) VALUES
(25, 'quanly1', '$2y$12$ZooOxNgIlZtD/YvcZeMsW.4PkKkCp66Ybk42Bc3WL0WhgjupAi5Z2', 'Quản Lý'),
(26, 'phongvien1', '$2y$12$FoCfCY3B3r9h8Ov220SOwObv4RqvVE84Pjg1d/VxLullinCLMdfWm', 'Phóng Viên'),
(27, 'bientap1', '$2y$12$0AsO.ggauOorDYdW19plG.2mMOF1WP8NR7nMZig95cfT1qaNYP7r2', 'Biên Tập Viên'),
(28, 'kiemduyet1', '$2y$12$kZ9xwluW9HLgfI0j2EL83uGsmTyV7dpYS24wiOIEMccnyHY6GmDXG', 'Kiểm Duyệt Viên'),
(29, 'testedit1', '$2y$12$eUex4q3.QtdTy3s8.6WoAOvE5NHUC8qs4obTIKHIPGuCR/YJwvKim', 'Biên Tập Viên'),
(30, 'testedit2', '$2y$12$WNSXEt2.6qQ4TBukuGEftOK8hc6xxnhM/xzpRTmnWK0dd894AE6fW', 'Kiểm Duyệt Viên'),
(31, 'test3', '$2y$12$C1nHrW.pDO2V7eyMiXMAqu/M9Pus1RfJNWttw14Qcg/wUdJZ3zUWe', 'Phóng Viên'),
(32, 'test4', '$2y$12$/eZy1S9PI.sSnzuQKNKe4Oy5cJGDB1U5ogopSfUiLUq7H1D1NXVem', 'Kiểm Duyệt Viên'),
(33, 'test5', '$2y$12$LcKHCiPkyTNaIY/qJIEMz.H4DePFTjjAMmoqgCgGddaaVEaTE0Zke', 'Quản Lý'),
(34, 'test6', '$2y$12$bh/7kE54OpmploG79LLvaOUFvi7S9DB0cX0/Xx//QPE9MXlaTsfne', 'Quản Lý'),
(35, 'quanlytest', '$2y$12$/paLDrgek6wQIL10A5UoOulz2Z3i5Mq0HttGegrag44oNvS38fM8K', 'Chức Vụ Test'),
(36, 'test7', '$2y$12$kAPNUHZNr.SBjAVe5D04WeuVvfzbp9K27sWS93l6UyM.07jgORjTm', 'Chức Vụ Test'),
(38, 'test8', '$2y$12$RV.ZujzvIhzd8/Qegn60ZurAq/s7keCS4ERnDcHOpTBRx4QgK5txu', 'Chức Vụ Test'),
(39, 'testnhanvien', '$2y$12$1hQ2gVI7YBYq7bWZmpMyheLBqgtCOX3V8/DEMRt/JH.pyUExZz0AS', 'Chức Vụ Test 2'),
(40, 'testchucvu31', '$2y$12$D1fCxOndyayhhWVMEA0iI.AMzdu5q6aBczjqLDz8keyZDChlISHxO', 'Chức Vụ Test 2'),
(41, 'TestCuoi', '$2y$12$h0evMpXu2RrM8.TuOyrixO3wCQIrlX824qMfIH2OrIS4r4R6FZVKW', 'Chức Vụ Test'),
(42, 'testcuoi2', '$2y$12$FJU/oG3leuI20GvyRS0hgeTtoAJ4MijYWUJTzPe5DmVUmdXfBsYbG', 'Chức Vụ Test 3'),
(43, 'testtest', '$2y$12$1J7P3luk.UN9iH05M6iYQe.xZJP2TWjchxaVJB92ZQqKcriKg9gT2', 'Biên Tập Viên'),
(44, 'testest2', '$2y$12$XSWcDF9uJlgoqhjTltuWyuXeT1Vq8/rQG19qxUEXadKV3AWbxOJRG', 'Kiểm Duyệt Viên'),
(50, 'admin2', '$2y$12$vS5ZOvzaJoQ79Z.8yFGrCuvkNACDNbbuBg8hUtqNRpOWaTmr1q5Ve', 'Admin'),
(51, 'testbatloi', '$2y$12$6gV03QzekpPNMjPIV9tl5OeEF.2shrDmD7tYCbtTZJOt0mGXKANOe', 'Chức Vụ Test 3'),
(52, 'testbatloi2', '$2y$12$ZUHHZUIRyt2sx33vcNUNXeajEHvbAAnLmAbfv0yCBboaVd.eESTxe', 'Chức Vụ Test'),
(53, 'test0510', '$2y$12$D1Sdr6U7aXBl2G7El/WBuuWNJTLmIIh6uVK0lVr5ks25AGZ2nUrqS', 'Chức Vụ Test'),
(60, 'docgia1', '$2y$12$JVg7YBDSnCXP8Hahb0UOSu2ftD5fPuhwm/aQxYS3G57QYbF99GhRC', 'Độc Giả'),
(61, 'docgia2', '$2y$12$SkJCu4Jal7CxVxOlfcpMDuwxFYUVkIhaF7Iv6QDeIVxJdVpThQQNa', 'Độc Giả'),
(62, '1', '$2y$12$SFj8roPnJlGhKkBcUa4xe.h/9lD.BOf35LTTXQJOVgmR7prqbWyqi', 'Độc Giả'),
(63, 'docgia3', '$2y$12$Bm9Xip8P4zwieuUIlmctMeMV2z2z3coVBCyd/mR43bqhBgaLZkf9S', 'Độc Giả'),
(64, 'docgia4', '$2y$12$F.fG/LzpXY5PuMYFpFheCOwYi51q5W/PwxMjgNbhYNBNFBaatjAhq', 'Độc Giả'),
(65, 'docgia5', '$2y$12$IAcSVtirgNPNB8LPrlthZuT6D.5vayx6yTTq9SKVfNa3Ghqx2AWZi', 'Độc Giả'),
(66, 'admin3', '$2y$12$EZrZqSXgDKOcS9YukQGn9uNQAfX5U4izaVvs2xcNgtyUV0uXhFdGi', 'Admin'),
(67, 'admin4', '$2y$12$tf7XKcf4U4EC1Zv0QSKsLugGq/IPXIDQiG72dXi5FbP3kU7ShMlry', 'Admin'),
(68, 'admin', '$2y$12$oV9wJdvIn/6Lt/1AE.Bj.eMdjSOegaIs7oAJkqYsBItghLgAFMBR.', 'Admin'),
(69, 'docgia6', '$2y$12$Z2DMgO8pBjdZR4dDp1EC2ev516Q829058m.GaEUadbpzOARDP/SHS', 'Độc Giả');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bantinbientap`
--
ALTER TABLE `bantinbientap`
  ADD PRIMARY KEY (`MaBT_BT`),
  ADD KEY `LoaiBT_BT` (`LoaiBT_BT`),
  ADD KEY `MaNV_BTV` (`MaNV_BTV`),
  ADD KEY `MaBTHT` (`MaBTHT`);

--
-- Chỉ mục cho bảng `bantinhientruong`
--
ALTER TABLE `bantinhientruong`
  ADD PRIMARY KEY (`MaBT_HT`),
  ADD KEY `LoaiBT_HT` (`LoaiBT_HT`),
  ADD KEY `MaNV_PV` (`MaNV_PV`);

--
-- Chỉ mục cho bảng `bantinxuatban`
--
ALTER TABLE `bantinxuatban`
  ADD PRIMARY KEY (`MaBT_XB`),
  ADD KEY `LoaiBT_XB` (`LoaiBT_XB`),
  ADD KEY `MaBTBT_XB` (`MaBTBT_XB`),
  ADD KEY `MaBTHT_XB` (`MaBTHT_XB`),
  ADD KEY `MaKDV` (`MaKDV`);

--
-- Chỉ mục cho bảng `bophan`
--
ALTER TABLE `bophan`
  ADD PRIMARY KEY (`MaBP`);

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`MaCV`),
  ADD KEY `MaBP_CV` (`MaBP_CV`);

--
-- Chỉ mục cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  ADD PRIMARY KEY (`MaCM`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `docgia`
--
ALTER TABLE `docgia`
  ADD PRIMARY KEY (`MaDG`),
  ADD KEY `MaTK_DG` (`MaTK_DG`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`MaLT`),
  ADD KEY `MaCM_LT` (`MaCM_LT`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nentang`
--
ALTER TABLE `nentang`
  ADD PRIMARY KEY (`MaNT`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `MaCV_NV` (`MaCV_NV`),
  ADD KEY `MaTK_NV` (`MaTK_NV`);

--
-- Chỉ mục cho bảng `nhuanbut`
--
ALTER TABLE `nhuanbut`
  ADD PRIMARY KEY (`MaNB`),
  ADD KEY `MaBT_XB` (`MaBT_XB`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ChucVu_PhanQuyen` (`ChucVu_PhanQuyen`),
  ADD KEY `MaQuyen_PhanQuyen` (`MaQuyen_PhanQuyen`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`MaQuyen`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bantinbientap`
--
ALTER TABLE `bantinbientap`
  MODIFY `MaBT_BT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `bantinhientruong`
--
ALTER TABLE `bantinhientruong`
  MODIFY `MaBT_HT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `bantinxuatban`
--
ALTER TABLE `bantinxuatban`
  MODIFY `MaBT_XB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `bophan`
--
ALTER TABLE `bophan`
  MODIFY `MaBP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `MaCV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `chuyenmuc`
--
ALTER TABLE `chuyenmuc`
  MODIFY `MaCM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `docgia`
--
ALTER TABLE `docgia`
  MODIFY `MaDG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `MaLT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `nentang`
--
ALTER TABLE `nentang`
  MODIFY `MaNT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `nhuanbut`
--
ALTER TABLE `nhuanbut`
  MODIFY `MaNB` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `MaQuyen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bantinbientap`
--
ALTER TABLE `bantinbientap`
  ADD CONSTRAINT `bantinbientap_ibfk_1` FOREIGN KEY (`LoaiBT_BT`) REFERENCES `loaitin` (`MaLT`),
  ADD CONSTRAINT `bantinbientap_ibfk_2` FOREIGN KEY (`MaNV_BTV`) REFERENCES `nhanvien` (`MaNV`),
  ADD CONSTRAINT `bantinbientap_ibfk_3` FOREIGN KEY (`MaBTHT`) REFERENCES `bantinhientruong` (`MaBT_HT`);

--
-- Các ràng buộc cho bảng `bantinhientruong`
--
ALTER TABLE `bantinhientruong`
  ADD CONSTRAINT `bantinhientruong_ibfk_1` FOREIGN KEY (`LoaiBT_HT`) REFERENCES `loaitin` (`MaLT`),
  ADD CONSTRAINT `bantinhientruong_ibfk_2` FOREIGN KEY (`MaNV_PV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `bantinxuatban`
--
ALTER TABLE `bantinxuatban`
  ADD CONSTRAINT `bantinxuatban_ibfk_1` FOREIGN KEY (`LoaiBT_XB`) REFERENCES `loaitin` (`MaLT`),
  ADD CONSTRAINT `bantinxuatban_ibfk_2` FOREIGN KEY (`MaBTBT_XB`) REFERENCES `bantinbientap` (`MaBT_BT`),
  ADD CONSTRAINT `bantinxuatban_ibfk_3` FOREIGN KEY (`MaBTHT_XB`) REFERENCES `bantinhientruong` (`MaBT_HT`),
  ADD CONSTRAINT `bantinxuatban_ibfk_4` FOREIGN KEY (`MaKDV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Các ràng buộc cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD CONSTRAINT `chucvu_ibfk_1` FOREIGN KEY (`MaBP_CV`) REFERENCES `bophan` (`MaBP`);

--
-- Các ràng buộc cho bảng `docgia`
--
ALTER TABLE `docgia`
  ADD CONSTRAINT `docgia_ibfk_1` FOREIGN KEY (`MaTK_DG`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD CONSTRAINT `loaitin_ibfk_1` FOREIGN KEY (`MaCM_LT`) REFERENCES `chuyenmuc` (`MaCM`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MaCV_NV`) REFERENCES `chucvu` (`MaCV`),
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`MaTK_NV`) REFERENCES `taikhoan` (`MaTK`);

--
-- Các ràng buộc cho bảng `nhuanbut`
--
ALTER TABLE `nhuanbut`
  ADD CONSTRAINT `nhuanbut_ibfk_1` FOREIGN KEY (`MaBT_XB`) REFERENCES `bantinxuatban` (`MaBT_XB`);

--
-- Các ràng buộc cho bảng `phanquyen`
--
ALTER TABLE `phanquyen`
  ADD CONSTRAINT `phanquyen_ibfk_1` FOREIGN KEY (`ChucVu_PhanQuyen`) REFERENCES `chucvu` (`MaCV`),
  ADD CONSTRAINT `phanquyen_ibfk_2` FOREIGN KEY (`MaQuyen_PhanQuyen`) REFERENCES `quyen` (`MaQuyen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
