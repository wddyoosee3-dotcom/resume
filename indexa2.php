<?php
// 1. إعداد المتغيرات
$name = "عبد الودود";
$age = 30;
$role = "مطور PHP & Linux | متخصص في هندسة توزيع البيانات";
$vision = "ابتكار أنظمة لتوزيع المستودعات البيانية بناءً على معادلات خاصة.";
$skills = ["PHP", "Linux", "الشبكات", "Git"];

// 2. بداية كود HTML
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>الملف التعريفي | <?php echo $name; ?></title>
    <style>
        body { background: #0f172a; color: white; font-family: sans-serif; text-align: center; padding: 50px; }
        .card { background: #1e293b; padding: 30px; border-radius: 15px; border: 1px solid #38bdf8; display: inline-block; }
        .skill { background: #38bdf8; color: #0f172a; padding: 5px 10px; margin: 5px; border-radius: 5px; display: inline-block; font-weight: bold; }
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
</body>
</html>