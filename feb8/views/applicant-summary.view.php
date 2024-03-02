<div class="applicantSumContainer">
    <?php foreach ($applicants as $applicant): ?>
        <div class="applicantSumResults">
            <p>Name: <?= htmlspecialchars($applicant['firstName']) . ' ' . htmlspecialchars($applicant['lastName']) ?></p>
            <p>Experience: <?= htmlspecialchars($applicant['experience']) ?> years</p>
            <p>Level: <?= htmlspecialchars($applicant['level']) ?></p>
            <p>Skills: <?= is_array($applicant['skills']) ? implode(', ', $applicant['skills']) : $applicant['skills'] ?></p>
        </div>
    <?php endforeach; ?>
</div>