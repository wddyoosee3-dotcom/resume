<?php 
include 'config.php';


// 2. سحب البيانات من الجدول
$sql = "SELECT * FROM profile_info LIMIT 1";
$result = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($result);

// وضع البيانات في متغيرات لاستخدامها في الصفحة
$name = $data['name'];
$age = $data['age'];
$role = $data['role'];
$vision = $data['vision'];
$skills = ["PHP", "MySQL", "Linux", "Git"]; // سنقوم لاحقاً بوضعها في جدول منفصل

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>الملف التعريفي | <?php echo $name; ?></title>
    <style>
        
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700;900&display=swap');

    body {
        background: linear-gradient(135deg, #0f0c29, #302b63, #24243e);
        color: white;
        font-family: 'Tajawal', sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    .card {
        background: rgba(255,255,255,0.05);
        backdrop-filter: blur(10px);
        padding: 40px;
        border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.1);
        max-width: 500px;
        width: 90%;
        text-align: center;
    }

    h1 {
        font-size: 2.5rem;
        font-weight: 900;
        background: linear-gradient(to right, #38bdf8, #818cf8);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .skill {
        background: rgba(56,189,248,0.15);
        color: #38bdf8;
        padding: 6px 14px;
        margin: 5px;
        border-radius: 20px;
        display: inline-block;
        font-size: 0.9rem;
        border: 1px solid #38bdf8;
    }
</style>
</head>
<body>
    <div class="card">
        <h1><?php echo $name; ?></h1>
        <p><strong><?php echo $role; ?></strong></p>
        <div style="background:rgba(56,189,248,0.1); padding:15px; margin:15px; border-radius:10px;">
            <?php echo $vision; ?>
        </div>
        <div>
            <?php foreach($skills as $skill): ?>
                <span class="skill"><?php echo $skill; ?></span>
            <?php endforeach; ?>
        </div>
        <p style="margin-top:20px; color:#4ade80;">العمر: <?php echo $age; ?> عاماً | متفرغ للمشاريع</p>
    </div>

<!-- فورم الإضافة -->
<div style="margin-top:30px;">
    <h3 style="color:#38bdf8;">إضافة سيرة جديدة</h3>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name   = $_POST['name'];
        $age    = $_POST['age'];
        $role   = $_POST['role'];
        $vision = $_POST['vision'];

        $sql = "INSERT INTO profile_info (name, age, role, vision) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siss", $name, $age, $role, $vision);
        $stmt->execute();
        echo "<p style='color:#4ade80'>✅ تم الحفظ بنجاح!</p>";
    }
    ?>
    <form method="POST">
        <input type="text" name="name" placeholder="الاسم" required style="width:100%;padding:10px;margin:8px 0;border-radius:8px;border:none;"><br>
        <input type="number" name="age" placeholder="العمر" required style="width:100%;padding:10px;margin:8px 0;border-radius:8px;border:none;"><br>
        <input type="text" name="role" placeholder="المسمى الوظيفي" required style="width:100%;padding:10px;margin:8px 0;border-radius:8px;border:none;"><br>
        <textarea name="vision" placeholder="الرؤية" rows="3" style="width:100%;padding:10px;margin:8px 0;border-radius:8px;border:none;"></textarea><br>
        <button type="submit" style="background:#38bdf8;color:#0f172a;padding:10px 30px;border:none;border-radius:8px;cursor:pointer;">حفظ</button>
    </form>
</div>
</body>
</html>