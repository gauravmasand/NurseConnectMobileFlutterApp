<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diseases & Remedies</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts & Material Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS for enhanced styling -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f0f2f5;
        }

        .search-container {
            background: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 30px;
            padding: 10px 20px;
            margin-bottom: 40px;
        }

        .search-input {
            border: none;
            outline: none;
            padding: 10px;
            width: 100%;
        }

        .disease-card {
            border: none;
            margin-bottom: 20px;
        }

        .disease-card-header {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            padding: 20px;
            font-weight: 500;
            font-size: 18px;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .disease-card-header:hover {
            background-color: #0056b3;
        }

        .collapse-content {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .material-icons {
            vertical-align: middle;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Diseases and Remedies</h2>

        <!-- Search Input -->
        <div class="d-flex justify-content-center">
            <div class="search-container w-50 d-flex">
                <span class="material-icons text-muted me-2">search</span>
                <input type="text" class="search-input" id="searchInput" placeholder="Search for a disease..." onkeyup="searchDisease()">
            </div>
        </div>

        <?php
        // Array of diseases and their solutions and medications
        $diseases = [
            "Common Cold" => [
                "solution" => "Rest, stay hydrated, and consume vitamin C-rich foods.",
                "medications" => "Paracetamol, decongestants like pseudoephedrine, and antihistamines."
            ],
            "Flu" => [
                "solution" => "Rest, drink fluids, take fever-reducing medications.",
                "medications" => "Oseltamivir (Tamiflu), paracetamol, ibuprofen."
            ],
            "Allergic Rhinitis" => [
                "solution" => "Avoid allergens, use antihistamines.",
                "medications" => "Loratadine, cetirizine, nasal corticosteroids like fluticasone."
            ],
            "Asthma" => [
                "solution" => "Avoid triggers, use inhalers, practice breathing exercises.",
                "medications" => "Albuterol inhaler, budesonide, montelukast."
            ],
            "Hypertension" => [
                "solution" => "Exercise regularly, reduce salt intake, and take prescribed medications.",
                "medications" => "Amlodipine, lisinopril, losartan."
            ],
            "Diabetes" => [
                "solution" => "Maintain a healthy diet, exercise, and monitor blood sugar levels.",
                "medications" => "Metformin, insulin injections."
            ],
            "Headache" => [
                "solution" => "Stay hydrated, rest, and use pain relief medications if needed.",
                "medications" => "Paracetamol, ibuprofen."
            ],
            "Migraine" => [
                "solution" => "Avoid triggers, stay in a dark room, and take medications as prescribed.",
                "medications" => "Sumatriptan, ibuprofen, naproxen."
            ],
            "Obesity" => [
                "solution" => "Exercise regularly, follow a balanced diet, and avoid junk food.",
                "medications" => "Orlistat, liraglutide."
            ],
            "Insomnia" => [
                "solution" => "Maintain a regular sleep schedule, reduce caffeine intake, and avoid screens before bed.",
                "medications" => "Zolpidem, melatonin supplements."
            ],
            "Back Pain" => [
                "solution" => "Practice good posture, use proper lifting techniques, and consider physical therapy.",
                "medications" => "Ibuprofen, muscle relaxants like cyclobenzaprine."
            ],
            "Acne" => [
                "solution" => "Keep your skin clean, avoid touching your face, and use acne medications.",
                "medications" => "Benzoyl peroxide, salicylic acid, clindamycin topical."
            ],
            "Allergies" => [
                "solution" => "Identify and avoid allergens, use antihistamines as required.",
                "medications" => "Cetirizine, fexofenadine."
            ],
            "Indigestion" => [
                "solution" => "Avoid spicy foods, eat smaller meals, and stay upright after eating.",
                "medications" => "Antacids like calcium carbonate, omeprazole."
            ],
            "Constipation" => [
                "solution" => "Increase fibre intake, stay hydrated, and exercise regularly.",
                "medications" => "Psyllium husk, polyethylene glycol."
            ],
            "Diarrhea" => [
                "solution" => "Stay hydrated, avoid dairy products, and eat plain foods like rice and bananas.",
                "medications" => "Loperamide, oral rehydration solutions (ORS)."
            ],
            "Eczema" => [
                "solution" => "Use moisturizing creams, avoid irritants, and consider prescribed creams.",
                "medications" => "Hydrocortisone cream, tacrolimus."
            ],
            "Heartburn" => [
                "solution" => "Avoid spicy foods, don't lie down after eating, and use antacids.",
                "medications" => "Omeprazole, calcium carbonate antacids."
            ],
            "High Cholesterol" => [
                "solution" => "Eat a heart-healthy diet, exercise regularly, and take medications as prescribed.",
                "medications" => "Atorvastatin, rosuvastatin."
            ],
            "Osteoarthritis" => [
                "solution" => "Exercise to improve joint strength, use pain relief creams, and consider physical therapy.",
                "medications" => "Ibuprofen, acetaminophen, topical capsaicin."
            ],
            "Sinusitis" => [
                "solution" => "Use saline nasal sprays, stay hydrated, and use a humidifier to keep nasal passages moist.",
                "medications" => "Nasal decongestants like oxymetazoline, amoxicillin (if bacterial)."
            ],
            "Gastritis" => [
                "solution" => "Avoid acidic foods, stay hydrated, and use antacids or prescribed medications.",
                "medications" => "Omeprazole, ranitidine."
            ],
            "Bronchitis" => [
                "solution" => "Rest, stay hydrated, avoid smoking, and take cough suppressants if needed.",
                "medications" => "Dextromethorphan, albuterol inhaler (for wheezing)."
            ],
            "Pneumonia" => [
                "solution" => "Rest, drink plenty of fluids, and take antibiotics if prescribed by a doctor.",
                "medications" => "Azithromycin, levofloxacin."
            ],
            "Gout" => [
                "solution" => "Avoid high-purine foods, stay hydrated, and take anti-inflammatory medications as prescribed.",
                "medications" => "Allopurinol, colchicine."
            ],
            "Arthritis" => [
                "solution" => "Exercise regularly to maintain joint flexibility, and use anti-inflammatory medications if required.",
                "medications" => "Ibuprofen, naproxen."
            ],
            "Psoriasis" => [
                "solution" => "Use moisturizing creams, avoid stress triggers, and use topical creams as prescribed.",
                "medications" => "Topical corticosteroids, calcipotriol."
            ],
            "Conjunctivitis" => [
                "solution" => "Avoid touching your eyes, use warm compresses, and consult a doctor for prescribed drops.",
                "medications" => "Chloramphenicol eye drops, artificial tears."
            ],
            "Cough" => [
                "solution" => "Use a humidifier, stay hydrated, and take over-the-counter cough syrups if needed.",
                "medications" => "Dextromethorphan, guaifenesin."
            ],
            "Toothache" => [
                "solution" => "Rinse with warm saltwater, use pain relief medication, and see a dentist for a proper examination.",
                "medications" => "Ibuprofen, paracetamol."
            ],
            "Sunburn" => [
                "solution" => "Stay out of the sun, use aloe vera gel, and keep the skin moisturized.",
                "medications" => "Aloe vera gel, ibuprofen for pain."
            ],
            "Muscle Cramp" => [
                "solution" => "Gently stretch and massage the muscle, and stay hydrated to prevent further cramps.",
                "medications" => "Magnesium supplements."
            ],
            "Tonsillitis" => [
                "solution" => "Drink warm liquids, gargle with saltwater, and use pain relief medication if needed.",
                "medications" => "Ibuprofen, lozenges, antibiotics (if bacterial)."
            ],
            "Anxiety" => [
                "solution" => "Practice relaxation techniques like meditation, exercise regularly, and consult a mental health professional if needed.",
                "medications" => "Sertraline, diazepam."
            ],
            "Depression" => [
                "solution" => "Maintain a regular routine, engage in physical activity, seek support, and consult a mental health professional.",
                "medications" => "Fluoxetine, sertraline."
            ],
            "Bloating" => [
                "solution" => "Avoid carbonated drinks, eat slowly, and avoid foods known to cause gas.",
                "medications" => "Simethicone, activated charcoal."
            ],
            "Cold Sores" => [
                "solution" => "Apply antiviral creams, avoid picking at sores, and maintain good hygiene.",
                "medications" => "Acyclovir cream, valacyclovir."
            ],
            "Anemia" => [
                "solution" => "Eat iron-rich foods like leafy greens, take iron supplements, and monitor haemoglobin levels.",
                "medications" => "Ferrous sulphate, vitamin B12 supplements."
            ],
            "UTI (Urinary Tract Infection)" => [
                "solution" => "Stay hydrated, urinate frequently, and take antibiotics as prescribed by a doctor.",
                "medications" => "Trimethoprim, ciprofloxacin."
            ],
            "Fever" => [
                "solution" => "Take fever-reducing medication like paracetamol, stay hydrated, and rest.",
                "medications" => "Paracetamol, ibuprofen."
            ],
            "Tension Headache" => [
                "solution" => "Practice relaxation techniques, apply a warm compress, and avoid stress.",
                "medications" => "Ibuprofen, paracetamol."
            ],
            "Vertigo" => [
                "solution" => "Avoid sudden head movements, practice balance exercises, and take prescribed medications.",
                "medications" => "Betahistine, meclizine."
            ],
            "Ringworm" => [
                "solution" => "Keep affected areas dry, use antifungal creams, and avoid sharing personal items.",
                "medications" => "Clotrimazole, terbinafine."
            ],
            "Sore Throat" => [
                "solution" => "Gargle with warm saltwater, stay hydrated, and avoid irritants like smoke.",
                "medications" => "Lozenges, ibuprofen."
            ],
            "Hair Loss" => [
                "solution" => "Use gentle hair products, avoid excessive heat treatments, and maintain a balanced diet.",
                "medications" => "Minoxidil, biotin supplements."
            ],
            "Dandruff" => [
                "solution" => "Use anti-dandruff shampoo, keep the scalp clean, and avoid hair products that irritate the scalp.",
                "medications" => "Ketoconazole shampoo, selenium sulphide."
            ],
            "Nausea" => [
                "solution" => "Eat light meals, avoid strong odours, and stay hydrated.",
                "medications" => "Ondansetron, dimenhydrinate."
            ],
            "Eye Strain" => [
                "solution" => "Take regular breaks from screens, ensure proper lighting, and use artificial tears to relieve dryness.",
                "medications" => "Artificial tears like Systane, lubricating eye drops."
            ],
        ];
        
        ?>

        <!-- Accordion UI for displaying diseases and solutions -->
        <div class="accordion" id="diseaseAccordion">
            <?php $counter = 1; ?>
            <?php foreach ($diseases as $disease => $info): ?>
                <div class="card disease-card">
                    <div class="disease-card-header" id="heading-<?php echo $counter; ?>"
                         data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $counter; ?>"
                         aria-expanded="true" aria-controls="collapse-<?php echo $counter; ?>">
                        <?php echo "{$counter}. {$disease}"; ?>
                        <span class="material-icons float-end">expand_more</span>
                    </div>

                    <div id="collapse-<?php echo $counter; ?>" class="collapse"
                         aria-labelledby="heading-<?php echo $counter; ?>" data-bs-parent="#diseaseAccordion">
                        <div class="collapse-content">
                            <strong>Solution:</strong> <?php echo $info["solution"]; ?><br>
                            <strong>Medications:</strong> <?php echo $info["medications"]; ?>
                        </div>
                    </div>
                </div>
                <?php $counter++; ?>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Bootstrap 5 JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Material Icons -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.js"></script>

    <!-- Custom JS for Search Functionality -->
    <script>
        function searchDisease() {
            const input = document.getElementById('searchInput').value.toLowerCase();
            const diseaseCards = document.getElementsByClassName('disease-card');

            Array.from(diseaseCards).forEach(function (card) {
                const diseaseName = card.querySelector('.disease-card-header').textContent.toLowerCase();
                if (diseaseName.includes(input)) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            });
        }
    </script>
</body>

</html>
