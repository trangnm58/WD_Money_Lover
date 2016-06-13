<div id="profile-container">
    <div class="list card mp-info-card">
      <div class="item item-divider mp-card-divider">
        <h2>
          <b>Basic Information</b>
        </h2>
      </div>

      <div class="item mp-card-first-item">
        Họ tên:<span class="mp-right">{{eUser.profile.name}}</span>
      </div>

      <div class="item">
        Tên tài khoản:<span class="mp-right">{{eUser.username}}</span>
      </div>

      <div class="item">
        Ngày sinh:<span class="mp-right">{{eUser.profile.dob}}</span>
      </div>

      <div class="item">
        Giới tính:<span class="mp-right">{{eUser.profile.gender}}</span>
      </div>

      <div class="item">
        Dân tộc:<span class="mp-right">{{eUser.profile.ethnic}}</span>
      </div>
    </div>

    <div class="list card mp-info-card">
      <div class="item item-divider mp-card-divider">
        <h2>
          <b>Thông tin liên hệ</b>
        </h2>
      </div>

      <div class="item mp-card-first-item">
        Địa chỉ:<span class="mp-right">{{eUser.profile.address}}</span>
      </div>

      <div class="item">
        Điện thoại:<span class="mp-right">{{eUser.profile.phone}}</span>
      </div>

      <div class="item">
        Email:<span class="mp-right">{{eUser.profile.email}}</span>
      </div>
    </div>

    <div class="list card mp-info-card">
      <div class="item item-divider mp-card-divider">
        <h2>
          <b>Trình độ, kinh nghiệm</b>
        </h2>
      </div>

      <div class="item mp-card-first-item">
        Năm vào nghề:<span class="mp-right"></span>
      </div>

      <div class="item">
        Chức vụ:<span class="mp-right">{{eUser.profile.position}}</span>
      </div>

      <div class="item">
        Môn dạy:<span class="mp-right">{{eUser.profile.specialize}}</span>
      </div>

      <div class="item">
        Trình độ đào tạo:<span class="mp-right">{{eUser.profile.degree}}</span>
      </div>

      <div class="item">
        Trình độ chính trị:<span class="mp-right">{{eUser.profile.politic}}</span>
      </div>

      <div class="item">
        Đạt chuẩn tiếng Anh:<span class="mp-right">{{eUser.profile.english}}</span>
      </div>
    </div>

    <div class="list card mp-info-card">
      <div class="item item-divider mp-card-divider">
        <h2>
          <b>Thông tin khác</b>
        </h2>
      </div>

      <div class="item mp-card-first-item">
        Chế độ lao động:<span class="mp-right">{{eUser.profile.labor}}</span>
      </div>

      <div class="item">
        Đảng viên:<span class="mp-right">{{eUser.profile.party ? "Có" : "Không"}}</span>
      </div>

      <div class="item">
        Tổng phụ trách đội:<span class="mp-right">{{eUser.profile.team}}</span>
      </div>

      <div class="item">
        Thư viện:<span class="mp-right">{{eUser.profile.library}}</span>
      </div>

      <div class="item">
        Tham gia BDTX:<span class="mp-right">{{eUser.profile.education ?  "Có" : "Không"}}</span>
      </div>

      <div class="item">
        Ghi chú:<span class="mp-right">{{eUser.profile.note}}</span>
      </div>
    </div>
</div>