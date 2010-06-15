<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Match
 *
 * @author ngng
 */
class MatchBusiness {
    // LOCKEVN: implement business

	/**
	 * # ghi nhận trận đấu (post một trận lên)
	 */
	function Create()
	{}

	/**
	 * # ghi tên các đấu thủ vào trận
# tự tính hệ số cho trận đấu
	 */
	function Update()
	{
	}

	/**
	 * # xác nhận trận đấu (thoả mãn một trong 3 điều kiện sau để xác nhận)

    * admin hoặc mod hoặc người có vai vế (quan to nào đó ) xác nhận
    * có số lượng lớn viewer xác nhận (4 người). VD: một match giữa ông lockevn và ông fanbi, ngoài sân táng nhau rất vui, có cả đống khán giả xem. Sau đó có người post trận đấu lên diễn đàn, có n=4 người (member bình thường) xác nhận đã xem trận đó (viewer_confirm=4) thì match đó tự động được tính là confirm, đã xác nhận
    * các đấu thủ đều xác nhận +  2 (= một nửa con số ở trên) người xem xác nhận
	 */
	function Confirm()
	{
		 echo '';
	}

	/**
	 *
	 */
	function ConfirmByAdmin(MatchDTO $p_Match, PlayerDTO $p_Admin)
	{
	}


	
	/**
	 * # Người thắng có THÊM số điểm tương đương trình độ của người thua
# Người thua bị MẤT số điểm tương đương trình độ của mình
# Con số point mà một player có được sau khi thi đấu một confirmed match là được cộng dồn vào thành tích của anh ta (cái này giống như cách tính điểm của Golf thì phải). Có hạn chế này là do mình ko làm giống hệt ATP được (cả về tổ chức - vì khoai - lẫn kỹ thuật IT - vì lằng nhằng, tốn kém), vì các giải đấu ở mình có cố định đâu (phong trào mà), năm thì tổ chức, năm thì không, làm sao trừ điểm + điểm kiểu như ATP được.
# Về mục đích của hệ thống online: hệ thống nào thì cũng mong muốn thúc đâẩy thành viên chơi nhiều, chơi mạnh, khẳng định, show hàng, khoe đẳng cấp. Do vậy càng đánh nhiều (trong tour hay thách đấu) càng tốt.
# Giả dụ là thế, ông có muốn cày điểm cũng phải đấu tới 20 trân thách đấu mới bằng một trận tứ kết của giải to, tuỳ người thôi, có người thích cần cù tích tiểu thành đại, có người thích săn boss to luôn. Nhưng nó có các cái lợi:
    * thách đấu nhiều thì trình cũng lên --> tốt cho player
    * xem trận đấu thì cũng xôm --> tốt cho phong trào
    * đấu giải thì nhiều điểm hơn thách đấu ---> vẫn coi trọng giải

# Trình độ nghĩa là C B A A+

    * C: 1
    * B: 2
    * A: 8
    * A+: 20
    * VD: nếu anh Cường (trình C) thắng anh Biên (trình B) thì anh Cường được thêm B điểm, anh Biên bị mất B điểm
	 *
	 * 
	 */
	function ProcessMatch()
	{
	}

	/**
	 * read from database, return Match object
	 */
	function ReadInfo()
	{
	}

	/**
	 * ảnh trận đấu (làm sau)
	 */
	function AddImage()
	{
	}

	function TagImage($p_Image, $p_arrTagData)
	{
	}

	function CalculateMultiplyForMatch(MatchDTO $match)
	{
	}

}
?>