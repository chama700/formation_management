<h2>Modifier un cours</h2>
<form method="post" enctype="multipart/form-data">
    <input name="name" value="<?= $course['name'] ?>" required><br>
    <textarea name="content"><?= $course['content'] ?></textarea><br>
    <textarea name="description"><?= $course['description'] ?></textarea><br>
    <input name="audience" value="<?= $course['audience'] ?>"><br>
    <input name="duration" value="<?= $course['duration'] ?>"><br>
    <input name="testIncluded" value="<?= $course['testIncluded'] ?>"><br>
    <textarea name="testContent"><?= $course['testContent'] ?></textarea><br>
    <img src="<?= $course['logo'] ?>" width="100"><br>
    <input type="file" name="logo"><br>
    <input type="hidden" name="old_logo" value="<?= $course['logo'] ?>">
    <select name="subject_id" required>
        <?php foreach ($subjects as $subject): ?>
            <option value="<?= $subject['id'] ?>" <?= $subject['id'] == $course['subject_id'] ? 'selected' : '' ?>>
                <?= $subject['name'] ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <button type="submit">Mettre à jour</button>
</form>
