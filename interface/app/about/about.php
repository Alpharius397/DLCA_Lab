<?php 
   session_start();
   include('../../../databaseinfo/security/secure.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us - Computer Engineering Department</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.3/font/bootstrap-icons.min.css">
<style>
body {
    margin: 0;
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background: url('https://kjsit.somaiya.edu.in/assets/kjsieit/images/about/abt_campus2.png') no-repeat center center fixed;
    background-size: cover;
    color: #333;
}

header {
            display: flex;
            background-color: #971426; 
            padding: 20px;
            color: #ffffff;
            width: 100%;
            box-sizing: border-box;
        }

.container {
    padding: 20px;
}

.section {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    margin: 20px 0;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

h1, h2, h3 {
    text-align: center;
}

.contributors, .guide {
    display: flex;
    justify-content: space-around;
    align-items: flex-start;
    margin-top: 20px;
}

.person {
    text-align: center;
    max-width: 200px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.person img {
    width: 100%;
    border-radius: 10%;
    height: 200px;
}

.person .name {
    margin-top: 10px;
    font-weight: bold;
}

.person .links {
    margin-top: 10px;
}

.person .links a {
    margin: 0 10px;
    text-decoration: none;
    color: #8B0000;
    font-size: 24px;
}

.footer {
    text-align: center;
    padding: 20px;
    background-color: rgba(255, 255, 255, 0.8);
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-top: 40px;
    width: 100%; /* Ensure footer spans entire width */
}

.flex-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    
}

.half-width {
    flex: 0 0 48%;
}

.full-width {
    flex: 0 0 100%;
}

.bullet-points {
    list-style-type: disc;
    padding-left: 20px;
}

.row {
    display: flex;
    width: 100%;
    justify-content: space-between;
    margin-bottom: 20px;
}

.column {
    width: 48%;
}

.spacing {
    margin-right: 20px;

}        
header h3{
            margin: auto;
            text-align: center;
        }

        header a{
            text-decoration: none;
            font-weight: bold;
            color: #ffffff;
        }
</style>
</head>
<body>
    <header>
        <a href="../../main/VLab.php" class="back-button">Back</a>
        <h3>About Us</h3>
        <a style="-ms-user-select: none;user-select: none;color: #971426;" class="white" >Back</a>
    </header>

<div class="container">
    <div class="section full-width">
        <h1>About Us</h1>
        <h2>Department of Computer Engineering</h2>
        <p>
            The Computer Engineering department was established in the year 2001 to impart quality education. The department has well qualified and motivated faculty members and support staff. The laboratories are adequately equipped with state-of-the-art facilities. The students are members of various professional bodies like IET, CSI, IEEE, NSS etc. Various platforms are available for students, like project competition, technical & cultural festivals, international conference, etc. to showcase their talent. It is a regular practice of the department to organize industrial visits, expert talks, workshops and internship in addition to the latest certification courses for students in the field of Computer engineering. Student have won prizes in various national and international level paper presentation, competitions, project exhibition etc. As the department has good industry interaction and alumni support, students get several opportunities of internship, project guidance, placement and many more.
        </p>
        <p>
            The department is accredited by NBA in 2018 and intake has doubled to 120 from academic year 2019-20. Besides offering undergraduate (B. Tech. in Computer Engineering) it also offers Post Graduation (M.Tech.) in Artificial Intelligence. As the autonomous status is awarded by UGC from academic year 2021-22, curricula have revised for UG and PG programs by Board of Studies. Exposure courses like Skill based, Activity based and Technology based courses are added to motivate students to participate in various activities. Under Project Based Learning (PBL) mini, minor and major projects are introduced from sem III to Sem VIII which help students to work in a team and develop projects using latest technologies. The department has to its credits of maximum number of placements of the students in Infosys, TCS, Accenture, Cognizant, L&T Infotech, CSC, Tech Mahindra, Mastek, ICON, Majesco, MuSigma, BNP Paribas. Every year, few students opt for pursuing higher studies at prestigious universities in India and abroad.
        </p>
    </div>
    <div class="flex-container">
        <div class="section full-width">
            <div class="row">
                <div class="section column spacing">
                    <h3>Vision of Department of Computer Engineering</h3>
                    <p>
                        To be an excellent center of learning, imparting quality education and creating computer competent professionals to serve the society at large.
                    </p>
                </div>
                <div class="section column">
                    <h3>Program Educational Objectives (PEOs) : B.Tech. (Computer Engineering)</h3>
                    <ul class="bullet-points">
                        <li>Capable of analysing and solving problems for diverse applications.</li>
                        <li>Engaging themselves in lifelong learning and professional development to adapt to the dynamic work environment.</li>
                        <li>Able to exhibit a high level of professionalism and work collaboratively at their workplace.</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="section column spacing">
                    <h3>Mission of Department of Computer Engineering</h3>
                    <p>
                        To provide quality education required to shape skilled computer engineers.<br>
                        To promote scientific temper and research culture through interdisciplinary and industrial collaboration.<br>
                        To prepare industry ready professionals, having ethical values and social commitment.
                    </p>
                </div>
                <div class="section column">
                    <h3>Program Specific Outcomes (PSOs) : B.Tech. (Computer Engineering)</h3>
                    <ul class="bullet-points">
                        <li>Apply the core concepts of computer engineering to develop effective solutions.</li>
                        <li>Analyze, Design and Develop computer programs in order to efficiently build computer-based systems of various levels of complexity.</li>
                        <li>Build feasible solutions using cutting edge technologies in computer engineering.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="section full-width">
            <h2>Our Team</h2>
            <div class="contributors">
                <div class="person">
                    <img src="../../../images/contri/raj.jpg" alt="Raj More">
                    <div class="name">Raj More</div>
                    <div class="links">
                        <a href="mailto:raj.more@somaiya.edu"><i class="bi bi-envelope"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="person">
                    <img src="../../../images/contri/aryan.jpg" alt="Aryan Mandke">
                    <div class="name">Aryan Mandke</div>
                    <div class="links">
                        <a href="mailto:aryan.mandke@somaiya.edu"><i class="bi bi-envelope"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="person">
                    <img src="../../../images/contri/pranav.jpg" alt="Pranav Lohar">
                    <div class="name">Pranav Lohar</div>
                    <div class="links">
                        <a href="mailto:pranav.lohar@somaiya.edu"><i class="bi bi-envelope"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
                <div class="person">
                    <img src="../../../images/contri/dhruv.jpg" alt="Dhruv Mavani">
                    <div class="name">Dhruv Mavani</div>
                    <div class="links">
                        <a href="mailto:dhruv.mavani@somaiya.edu"><i class="bi bi-envelope"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="section full-width">
            <h3>Project Guide</h3>
            <div class="guide">
                <div class="person">
                    <img src="../../../images/contri/priyanka_maam.jpg" alt="Prof. Priyanka Deshmukh">
                    <div class="name">Prof. Priyanka Deshmukh</div>
                    <div class="links">
                        <a href="mailto:p.deshmukh@somaiya.edu"><i class="bi bi-envelope"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Department Of Computer Engineering &copy; 2023-24</p>
            <p>Guided by : Prof. Priyanka Deshmukh</p>
            <p>Developed by : Raj More, Aryan Mandke, Pranav Lohar, Dhruv Mavani</p>
        </div>
    </div>
</div>
</body>
</html>
