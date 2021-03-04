<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    </head>
    <body>
    <button id="printPageButton" onclick="window.print()"><i class="fas fa-print"></i> Print this page</button>
        <div class="container border border-primary">
            <div class="row">
                <div class="col">
                <img src="<?php echo base_url();?>assets/img/logo_receipt.png" alt="" class="float-left" width="auto" height="100px">
                    <div class="container text-right">
                        Print Date : <?php echo date('Y-m-d H:i:s');?> <br>
                        Patricipated Date : <?php echo $date_added; ?>
                    </div>
                </div>
            </div>
            <div class="container text-center font-weight-bold">
                แบบยืนยันการสมัครสมาชิก <br>
                โครงการประเมิณคุณภาพห้องปฏิบัติการโดยองค์กรภายนอก <br>
                คณะเทคนิคการแพทย์ มหาวิทยาลัยมหิดล
            </div>
            <?php foreach ($company as $key => $value): ?>
            <div class="container text-left">
                Patricipated ID : <?php echo $member_no; ?><br>
                โรงพยาบาล/หน่วยงาน : <?php echo $value->name; ?><br>
                ห้องปฏิบัติการ : <?php echo $value->room; ?>
            </div>
            <td><hr/></td>
            <div class="container text-left">
                ที่อยู่ : <?php echo $value->address_1." ".$value->address_2." แขวง/ตำบล : ".$value->district." เขต/อำเภอ : ".$value->country." จังหวัด : ".$value->province." รหัสไปรษณีย์ : ".$value->postcode;?> <br>
                ผู้สมัครสมาชิก : <?php echo $firstname." ".$lastname; ?> <br><br>
            </div>
            <div class="container text-left font-weight-bold">
                รายการสมัครและชำระค่าธรรมเนียม
            </div>
        <table class="table table-bordered">
        <thead>
            <tr>
                <th class="text-center">โครงการ</th>
                <th class="text-center">ค่าธรรมเนียม(บาท)</th>
                <th class="text-center">ชื่อผู้ชำระเงิน</th>
                <th class="text-center">ออกใบเสร็จในนาม</th>
                <th class="text-center">ที่อยู่จัดส่งใบเสร็จ</th>
                <th class="text-center">ผู้ประสานงานชำระเงิน</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($program_list as $key => $value) { ?>
            <tr>
                <td class="text-center"><?php echo $value->program_name; ?></td>
                <td class="text-center"><?php echo number_format($value->price, 2); ?></td>
                <td class="text-center"><?php echo $value->bill_company; ?></td>
                <td class="text-center"><?php echo $value->bill_name; ?></td>
                <td class="text-left"><?php echo $value->bill_address; ?></td>
                <td class="text-center"><?php echo $value->bill_contact; ?></td>
            </tr>
            <?php } ?>
            <?php endforeach; ?>
            <tr>
            <td colspan="6" style="font-size: 13px;"> 
                *สมัครสมาชิก EQAB:GRAM และ EQAB:AFB จะได้รับส่วนลด 200 บาท (โดยค่าธรรมเนียม 1,800 บาท) <br>
                **สมัครสมาชิก EQAB ครบทั้ง 3 การทดสอบ จะได้รับส่วนลด 500 บาท (โดยคิดค่าธรรมเนียม 2,500 บาท)</td>
            </tr>
            <tr>
                <td class="font-weight-bold" colspan="3">ค่าธรรมเนียมการสมัครสมาชิก</td>
                <td colspan="2"><?php echo number_format($total,2); ?></td>
                <td colspan="2">บาท</td>
            </tr>
            <tr>
                <td class="font-weight-bold" colspan="3">ส่วนลด</td>
                <td colspan="2"><?php echo number_format($discount,2); ?></td>
                <td colspan="2">บาท</td>
            </tr>
            <tr>
                <td class="font-weight-bold" colspan="3">รวมค่าธรรมเนียมที่ต้องชำระทั้งสิ้น ("<?php echo $total_text;?>")</td>
                <td colspan="2"><?php echo number_format(($total-$discount),2); ?></td>
                <td colspan="2">บาท</td>
            </tr>
        </tbody>
        </table>
            <div class="container text-left font-weight-bold">
                ช่องทางการชำระเงินค่าธรรมเนียม
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">ที่</th>
                    <th scope="col">ช่องทาง</th>
                    <th scope="col">หน่วยงาน</th>
                    <th scope="col">ระยะเวลาออกใบเสร็จรับเงิน</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>เงินสด</td>
                        <td>ศูนย์พัฒนามาตรฐานและการประเมินผลิตภัณฑ์ (*ติดต่อจองคิวก่อนเข้ารับบริการ)</td>
                        <td class="text-center">5 - 10 นาที</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>โอนเงิน ผ่านเคาเตอร์ธนาคาร/ Netbank/ ATM/ Moblie Application</td>
                        <td>บัญชี ธนาคารไทยพาณิชย์ สาขาศิริราช เลขที่บัญชี 016-452491-2 ชื่อบัญชี*โครงการ ประเมินคุณภาพทางห้องปฏิบัติการโดยองค์กรภายนอก คณะเทคนิคการแพทย์</td>
                        <td class="text-center">7 - 14 วันทำการ หลังจากได้รับ หลักฐาน การชำะเงิน</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>เช็คธนาคาร</td>
                        <td>สั่งจ่ายในนาม "โครงการ การประเมินคุณภาพทางห้องปฏิบัติการ โดยองค์กรภายนอก คณะเทคนิคการแพทย์"</td>
                        <td class="text-center">7 - 14 วันทำการหลังจากได้รับเช็คธนาคารตัวจริง</td>
                    </tr>
                </tbody>
            </table>
            <div class="container text-left font-weight-bold">
                สำเนาหลักฐานการชำระเงิน และส่งมาที่ (เลือกช่องทางที่ท่านสะดวกเพียงช่องทางเดียว)
            </div>
            <table class="table table-bordered">
                <tr>
                    <td>1.</td>
                    <td>ระบบสมัครสมาชิกออนไลน์</td>
                    <td><a href="<?php echo base_url();?>/payment/" target="blank"><i class="fas fa-file"></i>  ส่งเอกสารแจ้งการชำระเงิน</a></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Email</td>
                    <td>eqamtmu@gmail.com</td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>โทรสาร</td>
                    <td>02 412 4110</td>
                </tr>
            </table>
            <div class="container text-center font-weight-bold" id="caution">
                **** การสมัครสมาชิกของท่านจะเสร็จสมบูรณ์ **** <br>
                หลังจากที่ท่านได้รับใบเสร็จรับเงินตัวจริง จากเทคนิคการแพทย์ มหาวิทยาลัยมหิดล <br>
            </div>
            <div class="container text-left pb-3" id="footer">
                มีปัญหาในการสมัครสมาชิก/ชำระเงิน ติดต่อ<br>
                ศูนย์พัฒนามาตรฐานและการประเมินผลิตภัณฑ์ <br>
                เลขที่ 2 ถนนวังหลัง แขวงศิริราช เขตบางกอกน้อย กรุงเทพฯ 10700 <br>
                โทรศัพท์ 02 412 3441 <br>
                โทรสาร 02 412 4110 <br>
                Email : eqamtmu@gmail.com
            </div>
        </div>
    </body>
</html>
<style>
    @media print {
  #printPageButton {
    display: none;
  }
}
#footer,#caution{
    font-size: 13px;
}
div.address{
    width: 150px;
    white-space: nowrap; 
    overflow: hidden;
    text-overflow: ellipsis;
} 
</style>
