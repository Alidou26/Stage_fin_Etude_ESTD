<div align="right"> <a href="./README.md">🇫🇷 Français</a> | <a href="./README.en.md">🇬🇧 English</a> </div>
<a name="top"></a>

<div align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
  <img src="https://img.shields.io/badge/Bootstrap-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap">
  <img src="https://img.shields.io/badge/Python-3776AB?style=for-the-badge&logo=python&logoColor=white" alt="Python">
  <img src="https://img.shields.io/badge/OpenCV-5C3EE8?style=for-the-badge&logo=opencv&logoColor=white" alt="OpenCV">
  <h1>Application de Gestion de Livraisons — AlloAbdo (Stage de fin d'études)</h1> 
  <p>Projet réalisé lors de mon stage de fin d'études à l'École Supérieure de Technologie (EST) Dakhla chez <strong>AlloAbdo</strong> 
    — gestion complète des livraisons + module vision par ordinateur pour le contrôle des vitesses.</p>
</div>

# [Video Démonstration](https://drive.google.com/file/d/1p6kfkWYCBZsjH0PLqSy-tZD9gWpFe-_K/view?usp=sharing)
Si le lien ne marche pas, considérez de copier lien et de le coller dans la barre de recherche.

# [Rapport](https://drive.google.com/file/d/1GSlM0FEUHL_MSP6LQCMOSZoeCxvAJUSF/view?usp=sharing)
Si le lien ne marche pas, considérez de copier lien et de le coller dans la barre de recherche.

## Table des Matières
1. [Introduction](#introduction)
2. [Fonctionnalités Clés](#features)
3. [Technologies Utilisées](#tech)
4. [Installation](#installation)
5. [Améliorations Futures](#future)
6. [Démo](#demo)

---

## Introduction<a name="introduction"></a>

J'ai réalisé ce projet durant mon stage de fin d'études à l'EST Dakhla, effectué au sein de la société AlloAbdo, spécialisée dans la livraison. 
L'objectif principal était de concevoir et déployer une application de gestion des activités de livraison pour améliorer le suivi opérationnel et la santé financière de l'entreprise, puis d'ajouter un module de vision par ordinateur pour contrôler la vitesse des livreurs et tracer les véhicules en excès de vitesse.

L'application vise à offrir aux administrateurs :

1. Une authentification sécurisée (mots de passe chiffrés en base de données).

2. Un tableau de bord complet montrant la santé financière (CA par client), l'évolution des colis et des statistiques journalières.

3. Des outils CRUD pour la gestion des clients et des colis.

4. La génération / impression de factures avec possibilité d'ajouter des charges supplémentaires.

5. Le module vision par ordinateur détecte les véhicules et motos, extrait la plaque d'immatriculation, estime la vitesse et place les véhicules en excès de vitesse dans un dossier dédié pour assurer la traçabilité.

<div align="right">
  <a href="#top">⬆ Retour en haut</a>
</div>

---

## Fonctionnalités Clés<a name="features"></a>

### 📊 Dashboard Administrateur
- Chiffre d'affaire par client et analyse comparative
- Visualisation de l'évolution des colis (statistiques journalières/mensuelles)
- Indicateurs clés de performance (KPI) financiers
- Système d'authentification sécurisé (mots de passe cryptés)

### 🧾 Gestion des Opérations
- CRUD complet des clients (Ajout/Modification/Suppression)
- Suivi en temps réel du statut des colis
- Impression de factures avec ajout de charges supplémentaires
- Historique complet des transactions

### 🚦 Module de Sécurité Routière
- Détection automatique de vitesse des véhicules
- Reconnaissance des plaques d'immatriculation
- Classement des excès de vitesse dans un dossier dédié
- Génération de rapports d'infractions

### 📈 Reporting
- Export des données (PDF/txt)


<div align="right">
  <a href="#top">⬆ Retour en haut</a>
</div>

---

## Technologies Utilisées<a name="tech"></a>

<div align="center">
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/php/php-original.svg" width="60" height="60" alt="PHP">
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/mysql/mysql-original-wordmark.svg" width="60" height="60" alt="MySQL">
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/bootstrap/bootstrap-plain-wordmark.svg" width="60" height="60" alt="Bootstrap">
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/python/python-original-wordmark.svg" width="60" height="60" alt="Python">
  <img src="https://raw.githubusercontent.com/devicons/devicon/master/icons/opencv/opencv-original-wordmark.svg" width="60" height="60" alt="OpenCV">
  <img src="https://www.vectorlogo.zone/logos/javascript/javascript-icon.svg" width="60" height="60" alt="JavaScript">
</div>

### Application Web
- **Frontend** : Bootstrap, JavaScript, HTML5/CSS3
- **Backend** : PHP 
- **Base de données** : MySQL 
- **Sécurité** : Cryptage , Sessions protégées

### Module Computer Vision
- **Langage** : Python 3.x
- **Bibliothèques** : OpenCV, YOLO (Object Detection)
- **Traitement d'images** : Contour detection, Optical Flow
- **Calcul vitesse** : Analyse de flux vidéo temps-réel
  <img src="image/f.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">

<div align="right">
  <a href="#top">⬆ Retour en haut</a>
</div>

---

## Installation<a name="installation"></a>

### Prérequis
- XAMPP (Apache, MySQL, PHP)

### Étapes d'installation
1. **Cloner le dépôt**
   ```bash
   git clone https://github.com/Alidou26/Stage_fin_Etude_ESTD.git
   cd Stage_fin_Etude_ESTD
   ```
   
2. **Configurer la base de données**

  - Importer alloabdo.sql dans phpMyAdmin

  - Configurer les accès dans BaseDeDonnees.php
    

 3. **Démarrer le serveur**

   - Lancer Apache et MySQL via XAMPP

   - Accéder à http://localhost/Stage_fin_Etude_ESTD


<div align="right"> <a href="#top">⬆ Retour en haut</a> </div>

---

## Améliorations Futures<a name="future"></a>

 1. 📱 **Application mobile (React Native / Flutter)** pour les livreurs (prise de photo, validation de livraison, signature).

 2. 🔐 **Renforcement sécurité** : JWT, 2FA, gestion des sessions, audit des actions.

 3. ☁️ **Déploiement cloud (Azure / AWS) avec CI/CD.**

 4. 🤖 **Alertes automatiques** : SMS / e-mail pour colis en retard ou incidents.

 5. 📈 **Prévisions / BI** : tableau de bord analytique avec prévisions de volume et optimisation des tournées.

 6. 🧭 **Amélioration du module CV** : passage à un modèle deep-learning (YOLOv5/YOLOv8) pour détection plus robuste et LPR (ALPR) plus fiable.

 7. 🗂️ **Interface d'audit** pour consulter rapidement les cas d'excès de vitesse (replay, métadonnées, export).

<div align="right"> <a href="#top">⬆ Retour en haut</a> </div>

---

## Démo<a name="demo"></a>

<img src="image/1.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/2.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/3.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/4.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/5.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/6.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/7.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/8.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/9.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/10.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/11.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/12.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/13.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">
<img src="image/14.png" style="width: 80%; max-width: 600px; height: auto; display: block; margin: 20px auto; border: 2px solid #ccc; border-radius: 10px;" alt="Aperçu de l'image">

<div align="right"> <a href="#top">⬆ Retour en haut</a> </div>
