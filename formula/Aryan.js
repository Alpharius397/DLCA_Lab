/** Returns 2^n. c ->integer*/
function po(n){
    return Math.pow(2,n);
}

/** Returns absolute value of c. c ->integer */
function ab(c) {
    return Math.abs(c)
}

/** Returns 1 if c is less than 0 else 0. c ->integer */
function less(c) {
    if (c < 0) {
        return 1;
    } else {
        return 0;
    }
}

/** Return binary representation of N upto Cnt bits */
function binary(N, Cnt) {
    let i, j = 1;
    let ans = "";

    while (N != 0) {
        i = N % 2;
        N = Math.floor(N / 2);
        ans = String(i) + ans;
        j += 1;
    }

    while (j <= Cnt) {
        ans = "0" + ans;
        j += 1;
    }

    return ans;
}

/** Returns max of M and Q. Q,M -> integer  */
function max(M,Q){
    return Math.max(M,Q)
}

/** Returns min of M and Q. Q,M -> integer */
function min(M,Q){
    return Math.min(M,Q)
}

/** Returns 0 if a divisible by 2 else 1. Q,M -> integer */
function odd(a) {
    if (a % 2 === 0) {
        return 0;
    } 
    else {
        return 1;
    }
}

/** Return binary representation of N upto Cnt bits with the lowest bit as _ for left arithemtic shift. N,Cnt ->integer */
function bina(N, Cnt) {
    let i, j = 1;
    let ans="";
    i=N % 2;
    N=Math.floor(N/2);
    ans="_"+ans;

    while (N!=0) {   
        i=N%2;
        N=Math.floor(N/2);
        ans=String(i)+ans;
        j+=1;
    }

    while(j<Cnt){
        ans="0"+ans;
        j+=1;
    }

    return ans;
}

/** Finds the max bit count of M and Q. Q,M -> integer */
function pow2(M,Q){
    let n = 0,b;

    while (true) {
        b = po(n);

        if ((Q>=b) || (M>=b)){
            n+=1
        }
        else{
            break;
        }
    }

    return n + 1
}

/** If A exceeds it's max value, brings it into range (as we ignore final carry), A,d,c->integer */
function shoveoff(A,d,c){
    if(A > d){
        A = A % c
    }

    return A;
}

/** Returns array with each steps of non-restoring division algorithm. Q (Dividend) , M (Divisor) {Q/M} -> integer */
function nonrestoring(Q,M){
    
    var result = []
    let A = 0;
    let b, c, d;
    let nM;
    let count = 1, Cnt;
    let ac,q,m;
    let Aflag;

    count = pow2(M,Q)
  
    b = po(count - 1);
    c = po(count);
    d = c - 1;
    Cnt = count;
    nM = (d - M) + 1;

    while (count != 0) {
       
        if(count == Cnt){
            act = "Initialization";
            ac = binary(A, Cnt);
            q = binary(Q, Cnt);
            m = binary(M , Cnt);
            result.push({count,m,ac,q,act});
        }

        A*=2;
        Q*=2;
        Aflag = false;

        A = shoveoff(A,d,c);
        if (shoveoff(Q,d,c)!=Q){
            A += 1
            Q = shoveoff(Q,d,c);
            Aflag = true;
        }

        act = "Left Arithmetic Shift";
        ac = binary(A, Cnt);
        q = bina(Q, Cnt);
        m = binary(M , Cnt);
        result.push({count,m,ac,q,act,Aflag});

        if(A >= b){
            A = shoveoff(A + M,d,c)
            act="A = A + M";
        }
        else{
            A = shoveoff(A + nM,d,c)
            act = "A = A - M";
        }

        q = bina(Q, Cnt);
        ac = binary(A, Cnt);
        result.push({count,m,ac,q,act});
        
        if(A >= b){
            act = "Q[0] = 0";
            q = binary(Q, Cnt);
        }
        else{
            Q = Q + 1;
            act = "Q[0] = 1";
            q = binary(Q, Cnt);
        }

        result.push({count,m,ac,q,act});
        
        count-=1;
    }
   
    if(A >= b){
        A = shoveoff(A + M,d,c);
        ac = binary(A, Cnt);
        act = "A = A + M";
        result.push({count,m,ac,q,act});
    }    

    return result;
}

/** Returns a promise to delay actions. ms -> float */
function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

/** To find the current state/step of non-restoring algo and update it. cnt -> integer, p-> DOM element, opt -> string (action column) */
function Nonfind_state(cnt,p,opt){
    let a = result[cnt].act;
    let b = result[cnt].count;

    if(b==0){
        p.innerHTML = `As <b>A</b> is less than zero (as sign bit of A is 1), we add <b>M</b> (Divisor) into <b>A</b>.Thus A → A + M. `
    }
    else{
        switch(a){
            case "A = A - M":p.innerHTML = `${opt[2]}`; break;
            case "A = A + M":p.innerHTML = `${opt[5]}`; break;
            case "Q[0] = 1":p.innerHTML = `${opt[4]}`; break;
            case "Initialization":p.innerHTML = `${opt[0]}`; break;
            case "Left Arithmetic Shift":p.innerHTML = `${opt[3]}`; break;
            case "Q[0] = 0":p.innerHTML = `${opt[1]}`; break;
        }
    }
}

/** To find the current state/step of both algo and update it. cnt -> integer, p-> DOM element, opt -> string (action column) */
function boofind_state(cnt,p,opt){
    let a = result[cnt].act;

    switch(a){
        case "A = A - M":p.innerHTML = `${opt[2]}`; break;
        case "A = A + M":p.innerHTML = `${opt[1]}`; break;
        case "Initialization":p.innerHTML = `${opt[0]}`; break;
        case "Direct Right Arithmetic Shift":
        case "Right Arithmetic Shift":p.innerHTML = `${opt[3]}`; break;
    }
}

/** To find the current state/step of restoring algo and update it. cnt -> integer, p-> DOM element, opt -> string (action column) */
function Resfind_state(cnt,p,opt){
    let a = result[cnt].act;
    let b = result[cnt].count;

    if(b==0){
        p.innerHTML = `As <b>A</b> is less than zero (as sign bit of A is 1), we add <b>M</b> (Divisor) into <b>A</b>.Thus A → A + M.`;
    }

    switch(a){
        case "A = A - M":p.innerHTML = `${opt[2]}`; break;
        case "Q[0] = 1":p.innerHTML = `${opt[4]}`; break;
        case "Initialization":p.innerHTML = `${opt[0]}`; break;
        case "Left Arithmetic Shift":p.innerHTML = `${opt[3]}`; break;
        case "Q[0] = 0, A = A + M":p.innerHTML = `${opt[1]}`; break;
    }
}

/** Disables an button. next -> button element */
function buttondisabled(next){
    next.disabled = true;
    next.style.background = "grey";
    next.style.cursor = 'default';
}

/** Enables an button (blue version). a -> button element */
function buttonEnBlu(a){
    a.style.background = '#0074d9';
    a.disabled = false;
    a.style.cursor = 'pointer';
}

/** Enables an button (green version). a -> button element */
function buttonEnGre(a){
    a.style.background = '#00904a';
    a.disabled = false;
    a.style.cursor = 'pointer';
}

/** Returns an array with two sorted random numbers */
function random(){
    let x = Math.floor(Math.random()*15 + 10);
    let y = Math.floor(Math.random()*15 + 10);

    return [Math.max(x,y),Math.min(x,y)]
}

/** Returns array with each steps of restoring division algorithm. Q (Dividend), M (Divisor) {Q/M}-> integer */
function restoring(M,Q){
    var result = []
    let A = 0;
    let b, c, d;
    let nM;
    let count = 1, Cnt;
    let ac,q,m;
    let Aflag;

    count = pow2(M,Q)

    b = po(count - 1);
    c = po(count);
    d = c - 1;
    nM = (d - M) + 1;
    Cnt = count; 
    
    while (count != 0) {
        
        if(count == Cnt){
            act = "Initialization";
            ac = binary(A, Cnt);
            q = binary(Q, Cnt);
            m = binary(M , Cnt);       
            result.push({count,m,ac,q,act});
        }

        A*=2;
        Q*=2;
        Aflag=false;
        A = shoveoff(A,d,c);

        if (shoveoff(Q,d,c)!=Q){
            A += 1
            Q = shoveoff(Q,d,c);
            Aflag = true;
        }
        
        act = "Left Arithmetic Shift";
        ac = binary(A, Cnt);
        q = bina(Q, Cnt);
        m = binary(M , Cnt);
        result.push({count,m,ac,q,act,Aflag});

        A = shoveoff(A + nM,d,c)
        act = "A = A - M";
        ac = binary(A, Cnt);
        q = bina(Q, Cnt);
        result.push({count,m,ac,q,act});

        if(A >= b){
            A = A - nM;
            act = "Q[0] = 0, A = A + M";
            ac = binary(A, Cnt);
            q = binary(Q, Cnt);
            result.push({count,m,ac,q,act});
        }
        else{
            Q += 1;
            act = "Q[0] = 1";
            q = binary(Q, Cnt);
            result.push({count,m,ac,q,act});
        }

        count-=1;
    }

    if(A >= b){
        A = shoveoff(A + M,d,c)
        ac = binary(A, Cnt);
        act = "A = A + M";
        q = binary(Q, Cnt);
        result.push({count,m,ac,q,act});
    }

    return result;
}

/** Returns array with each steps of booth's algorithm. Q,M (Numbers to be multiplied) -> integer */
function booth(M, Q) {
    var result = [];
    let A = 0;
    let Q1 = 0;
    let flag = 0;
    let b, c, d;
    let Q0 = 0;
    let abM, abQ;
    let negQ, negM;
    let nQ, nM;
    let count = 1, Cnt;
    let ac, q, r, m;
    let q1;
    let Aflag,Qflag;

    abM = ab(M);
    abQ = ab(Q);
    negM = less(M);
    negQ = less(Q);

    count = pow2(abM,abQ);

    b = po(count - 1);
    c = po(count);
    d = c - 1;
    e = b / 2
    Cnt = count;

    nM = (d - abM) + 1;
    nQ = (d - abQ) + 1;

    if (negM === 1 || negQ === 1) {
        if (negM === 1) {
            M = nM;
        }
        if (negQ === 1) {
            Q = nQ;
        }
    }

    while (count != 0) {

        flag = odd(Q);

        if (flag === 1) {
            Q0 = 1;
        } else {
            Q0 = 0;
        }

        if (count == Cnt) {

            ac = binary(A, Cnt);
            q = binary(Q, Cnt);
            m = binary(M, Cnt);
            act = "Initialization";
            q1 = Q1.toString()
            result.push({count, m, ac, q,q1, act});
        }

        if (Q1 !== Q0) {
            if (Q0 === 1 && Q1 === 0) {
                if (negM === 1) {
                    A = A + abM;
                } else {
                    A = A + (d - M) + 1;
                }

                A = shoveoff(A,d,c);

                act = "A = A - M";
                ac = binary(A, Cnt);
                q = binary(Q, Cnt);
                q1 = Q1.toString()
                result.push({count, m, ac, q,q1, act});

                flag = odd(A);
                Q1 = odd(Q);
                Aflag=false;
                Qflag=false;

                Q = Math.floor(Q / 2);
                A = Math.floor(A / 2);
                
                if (flag === 1) {
                    Q += b;
                    Aflag=true;
                }

                if (A >= e) {
                    A += b;
                }

                if (Q1==1){

                    Qflag=true;
                }

                act = "Right Arithmetic Shift";

                ac = binary(A, Cnt);
                q = binary(Q, Cnt);
                q1 = Q1.toString()
                result.push({count, m, ac, q,q1, act,Aflag,Qflag});
            }


            else {
                if (negM === 1) {
                    A = A + nM;
                } else {
                    A = A + M;
                }
                
                A = shoveoff(A,d,c)

                act = "A = A + M";
                ac = binary(A, Cnt);
                q = binary(Q, Cnt);
                q1 = Q1.toString()
                result.push({count, m, ac, q,q1, act});

                flag = odd(A);
                Q1 = odd(Q);
                Aflag=false;
                Qflag=false;
                Q = Math.floor(Q / 2);
                A = Math.floor(A / 2);

                if (flag === 1) {
                    Q += b;
                    Aflag=true
                }

                if (A >= e) {
                    A += b;
                }

                if(Q1==1){
                    Qflag=true;
                }

                act = "Right Arithmetic Shift";

                ac = binary(A, Cnt);
                q = binary(Q, Cnt);
                q1 = Q1.toString()
                result.push({count, m, ac, q,q1, act,Aflag,Qflag});

            }
        } 
        else {
            Q1 = odd(Q);
            flag = odd(A);
            Aflag=false;
            Qflag=false;
            Q = Math.floor(Q / 2);
            A = Math.floor(A / 2);
            if (flag === 1) {
                Q += b;
                Aflag=true;
            }

            if(Q1==1){
                Qflag=true
            }

            if (A >= e) {
                A += b;
            }

            act = "Direct Right Arithmetic Shift";

            ac = binary(A, Cnt);
            q = binary(Q, Cnt);
            q1 = Q1.toString()
            result.push({count, m, ac, q,q1, act});
        }
        count -= 1;
    }

    r = ac + " " + q;
    ac = binary(A, Cnt);
    q = binary(Q, Cnt);
    q1 = Q1.toString()
    act = 'Final Result';
    result.push({count,m,ac,q,q1,act,r});
    console.log(result);
    return result;
}

/** Returns the output (integer) of a logic expression (single gate). a -> string (logic gate),inputValA,inputValB -> integer (1,0) */
function gate2(a,inputValA,inputValB){
    let output;
    switch (a) {
        case "AND Gate":
            output = (inputValA && inputValB);
            break;
        case "OR Gate":
            output = (inputValA || inputValB);
            break;
        case "NOT Gate":
            output = !inputValA;
            break;
        case "NOR Gate":
            output = !(inputValA || inputValB);
            break;
        case "XOR Gate":
            output = ((inputValA || inputValB) && !(inputValA && inputValB));
            break;
        case "NAND Gate":
            output = (!(inputValA && inputValB));
            break;
        case "XNOR Gate":
            output =(!((inputValA || inputValB) && !(inputValA && inputValB)));
            break;
        default:
            break;
    }

    if(output){
        output = 1;
    }
    else{
        output = 0;
    }

    return output;
}

/** Returns the output (integer) of a logic expression (double gate). a -> string (logic gate),inputValA,inputValB -> integer (1,0) */
function gate3(a,b,inputValA,inputValB,inputValC){
    let output;
    output = gate2(a,inputValA,inputValB);
    let out = gate2(b,output,inputValC);

    return out;
}

/** Displays a logic gate (in sim) with corresponding input and output. sim -> DOM (div), A,B,Output -> integer, Gate-> string (logic gate) */
function gatesdisplay1(sim,A,B,Output,Gate){
    if(Gate == 'not'){
        sim.innerHTML = `<table id="tab">
            <tr>
                <th rowspan="3"><p id="A1" style="padding-top: 0px;">${A}</p></th>
                <th rowspan="3"><img id ="img1" src ="../../../../images/gates/${Gate}/${A}${B}.png" height="150px" width="250px" style="margin-right: 5x;" draggable="false"></th>
                <th rowspan="3"><p id="out1" style="padding-top: 0px;">${Output}</p></th>
            </tr>
            </table>
            <th><p id="B1" style="padding-top: 10px;display:none;user-select: none;">${B}</p></th>`;
    }
    else{
        sim.innerHTML = `<table id="tab">
            <tr>
                <th rowspan="1"><p id="A1" style="padding-top: 20px;">${A}</p></th>
                <th rowspan="3"><img id ="img1" src ="../../../../images/gates/${Gate}/${A}${B}.png" height="150px" width="250px" style="margin-right: 5x;" draggable="false"></th>
                <th rowspan="3"><p id="out1" style="padding-top: 0px;">${Output}</p></th>
            </tr>
            <tr>
                <th><p id="B1" style="padding-top: 10px;">${B}</p></th>
            </tr>
            <tr>
                <th style="-ms-user-select: none;user-select: none;color: white;">1</th>
            </tr>

            </table>`;
    }

    var A1 = document.getElementById('A1');
    var B1 = document.getElementById('B1');
    var out1 = document.getElementById('out1');

    colorchange(A,A1);
    colorchange(B,B1);
    colorchange(Output,out1);

}

/** Displays 2 logic gate (in sim) with corresponding input and output. sim -> DOM (div), A,B,Output,C -> integer, Gate1,Gate2-> string (logic gate) */
function gatesdisplay2(sim,A,B,ab,C,Output,Gate1,Gate2){

    sim.innerHTML = `<table id="tab">
        <tr>
            <th><p id="A1" style="margin-top: 65px;">${A}</p></th>
            <th rowspan="3"><img id ="img1" src ="../../../../images/gates/${Gate1}/${A}${B}.png" height="150px" width="250px" style="margin-right: -20px;" draggable="false"></th>
            <th style="-ms-user-select: none;user-select: none;color: white;">1</th>
            <th rowspan="3"><img id="img2" src ="../../../../images/gates/${Gate2}/${ab}${C}.png" height="150px" width="250px" style="padding-top: 65px" draggable="false" ></th>
            <th rowspan="3"><p id="out1" style="padding-top: 60px;">${Output}</p></th>
        </tr>
        <tr>
            <th><p id="B1" style="margin-top: 3px;">${B}</p></th>
            <th rowspan="2"><p id="C1" style="padding-top: 24px;">${C}</p></th>
        </tr>
        <tr>
            <th style="-ms-user-select: none;user-select: none;color: white;">1</th>
        </tr>

        </table>`;

    var A1 = document.getElementById('A1');
    var B1 = document.getElementById('B1');
    var C1 = document.getElementById('C1');
    var img2 = document.getElementById('img2');
    var out1 = document.getElementById('out1');

    if(Gate2 == 'nor'){
        img2.style.paddingTop = "60px";
        C1.style.paddingTop = "15px";
    }

    if(Gate1 == 'not'){
        A1.style.marginTop = "100px";
        B1.style.userSelect = "none";
        B1.style.color = "white";
        C1.style.paddingTop = "0px";
        C1.style.marginTop = "6px";

        if(Gate2 == 'nor'){
            A1.style.marginTop = "96px";
            C1.style.paddingTop = "5px";
            C1.style.marginTop = "-5px";
        }
    }

    if (Gate2 == 'not'){
        A1.style.marginTop = "16px";
        A1.style.paddingTop = "20px";
        B1.style.marginTop = "25px";
        img2.style.paddingTop = "0px";
        out1.style.paddingTop = "0px";
        out1.style.marginTop = "13px";
        out1.style.marginBottom = "16px";
        C1.style.display = 'none';

        if(Gate1 == 'not'){
            A1.style.marginTop = "80px";
            B1.style.userSelect = "none";
            B1.style.color = "white";
        }
    }
    
    colorchange(A,A1);
    colorchange(B,B1);
    colorchange(C,C1);
    colorchange(Output,out1);
    
}

/** Changes color of A (logic gate input) to green or red depending on its value (Aval). A -> DOM, Aval -> integer (1,0) */
function colorchange(Aval,A){

    if(A.style.color != "white"){
        if(Aval == 1){
            A.style.color = "green";
        }
    else{
        A.style.color = "red";
    }
    }
}

/** Used to make Logic Interface reactivity by disabling inputs. a,b -> string (logic gates), inputA,inputB,inputC -> DOM (select option) */
function gatecheck(a,b,inputA,inputB,inputC){
    if(a=='NOT Gate'){
        inputB.disabled = true;
    }
    else{
        inputB.disabled = false;
    }

    if(b=='NOT Gate' || b=='-'){
        inputC.disabled = true;
    }
    else{
        inputC.disabled = false;
    }

    inputA.disabled = false;
}

/** Used to make Logic Interface reactivity by displaying column. colA -> DOM (table) */
function appear(colA){
    colA.forEach(col => {
        col.style.display = '';
    });
}

/** Used to make Logic Interface reactivity by hiding column. colA -> DOM (table) */
function dissappear(colA){
    colA.forEach(col => {
        col.style.display = 'none';
    });
}

/** Returns - incase of no Inputs (for logic gates). a -> String('-')/integer (1,0) */
function dash(a){
    if(a.disabled){
        return '-'
    }
    else{
        return parseInt(a.value);
    }
}

/** Inserts logic gate expression row into table (Confirm). row,Confirm -> DOM (table), inputA,inputB,inputC,output -> integer(1,0), ,gate_1,gate_2 -> string (logic gates) */
function confirminsert(inputA,inputB,inputC,gate_1,gate_2,output){
    row = document.createElement('tr');
    row.innerHTML = `
                    <td style="border: 1px solid black" class="colA">${dash(inputA)}</td>
                    <td style="border: 1px solid black" class="colA">${dash(inputB)}</td>
                    <td style="border: 1px solid black" class="colB">${dash(inputC)}</td>
                    <td style="border: 1px solid black" class="colA">${gate_1}</td>
                    <td style="border: 1px solid black" class="colB">${gate_2}</td>
                    <td style="border: 1px solid black" class="colA">${output}</td>`;

    Confirm.appendChild(row);
    out.innerHTML = `${output}`;
    cnt += 1;

    if(cnt>15){
        Confirm.removeChild(Confirm.firstChild);
    }

    const colA = document.querySelectorAll('.colA');
    const colB = document.querySelectorAll('.colB');
        
    if (gate_2  =='-' ){
        dissappear(colB);
    }
    else{
        appear(colB);
    }

    appear(colA);
}

/** Updates quiz with correct/incorrect remarks after submission. count -> dictionary with answers */
function submitQuiz(count) {
    const answers = {
        q0: count[0].ac,
        q1: count[1].q,
        q2: count[2].act
    };

    let score = 0;
    Object.keys(answers).forEach(question => {

        const selectedOption = document.querySelector(`input[name=${question}]:checked`);
        const selectedOption1 = document.querySelector(`input[name=${question}]`);
        const feedback = selectedOption1.parentElement.querySelector('.feedback');

        if (selectedOption) {
            const userAnswer = selectedOption.value;
            const correctAnswer = answers[question];

            if (userAnswer === correctAnswer) {
                score++;
                feedback.textContent = 'Correct Answer';
                feedback.style.color = 'green';
            } else {
                feedback.textContent = 'Incorrect Answer';
                feedback.style.color = 'red';
            }
         
        }
        else{
                feedback.textContent = 'No Answer Selected';
                feedback.style.color = 'red';
            }

    });

    const scoreDisplay = document.querySelector('.score');
    scoreDisplay.textContent = `You scored ${score} out of ${Object.keys(answers).length}`;
    scoreDisplay.style.color = 'green';

    if(score>2){
    document.querySelector('.feed-button').style.display = 'block';
    }
    else{
        document.querySelector('.feed-button').style.display = 'none';
    }
}

/** Returns special columns (DOM element) (Q-1) for booth algo. type,index -> integer, answer -> dictionary with answers */
function addBooth(type,index,answer){
    if(type!=0){
        return '';
    }

    if(index==0){
        return `<th>Q<sub>-1</sub></th>`;
    }
    else if(index==1){
        return `<td>${answer.q1}</td>`;
    }
    else{
        console.log(' Unintended Error!');
        return '';
    }
}

/** Generates question template and questions for each algo and returns answers of each option. type -> integer */
function createquestion(type){
    var count = []

    for(let i=0;i<3;i++){

        var list = random();

        switch(type){
            case 0: var result = booth(list[0],list[1]);var cnt = Math.floor(Math.random()*(result.length-3)+1); break;
            case 1: var result = restoring(list[0],list[1]);var cnt = Math.floor(Math.random()*(result.length-3)+1); break;
            case 2: var result = nonrestoring(list[0],list[1]);var cnt = Math.floor(Math.random()*(result.length-3)+1); break;
        }

        const li = document.createElement('li');
        li.innerHTML = `<p>${questionOption[i]}</p>
                        <table id="algoTable">
                        <thead>
                            <tr>
                                <th style="border-left: 1px solid black">Count</th>
                                <th>M</th>
                                <th>AC</th>
                                <th>Q</th>
                                ${addBooth(type,0,result[cnt])}
                                <th style="border-right: 1px solid black">Action</th>
                            </tr>
                        </thead>
                        <tbody id="algoBody"><td>${result[cnt].count}</td>
                            <td>${result[cnt].m}</td>
                            <td>${result[cnt].ac}</td>
                            <td>${result[cnt].q}</td>
                            ${addBooth(type,1,result[cnt])}
                            <td>${result[cnt].act}</td>
                    </tbody></table><br>

                    <div class="option">
                        ${randomQuestion(i,result[cnt+1],i,result,type)}
                    </div>`;

        tab.appendChild(li);
        count.push(result[cnt+1]);
    }  
    return count;
}

/** Generates options for each questions. i (denotes question no.), c (denotes which question is it, ac,q,act), type (denotes which topic) -> integer, answer (the answer to question),result (the entire steps of algo) -> dictionary?  */
function  randomQuestion(i,answer,c,result,type){
    option = createOption(result,c,answer,type);

    opt = `<input type="radio" name="q${i}" value="${option[0]}"> ${option[0]} <br>
           <input type="radio" name="q${i}" value="${option[1]}"> ${option[1]} <br>
           <input type="radio" name="q${i}" value="${option[2]}"> ${option[2]} <br>
           <p class="feedback"></p>`;

    return opt;
}

/** Static options for each algo. i (the topic chooser) -> integer */
function staticpool(i){
    var p;
    switch(i){
        case 0: p = ["A = A - M","A = A + M ","Right Arithmetic Shift","Direct Right Arithmetic Shift"]; break;
        case 1: p = ["Q[0] = 0, A = A + M","Left Arithmetic Shift","Q[0] = 1","A = A - M"]; break;
        case 2: p = ["Q[0] = 0","Left Arithmetic Shift","Q[0] = 1","A = A - M","A = A + M"]; break;
    }

    return p;
}

/** Returns array with unique steps. result (the entire steps of algo) -> dictinary, option (which sub question), question (which topic) -> integer */
function load(result,option,question){
    var pool =[]
    for(let i=0;i<result.length;i++){

        switch(option){
            case 0: pool[i] = result[i].ac; break;
            case 1: pool[i] = result[i].q; break;
            case 2: return staticpool(question); break;
        }
    }
    
    return Array.from(new Set(pool));
}

/** Returns the appropriate values for a sub-question. answer -> answers (dict), choice -> integer */
function value(answer,choice){
    if(choice==0){
        return answer.ac;
    }
    else if(choice==1){
        return answer.q;
    }
    else{
        return answer.act;
    }
}

/** Generates random option for each question (if possible else reload the page {May cause breakdown}). result -> answers(dict),option -> integer ,ansSet (the step that is the answer) -> dict,type -> integer  */
function createOption(result,option,ansSet,type){

    var i = 0;
    var q = load(result,option,type);
    var answer = value(ansSet,option);
    var ans = new Set();

    if(q.length<=3){
        console.log(' Insufficient Data (breaking)');
        location.reload();
    }

    while (ans.size<3){
        i = Math.floor(Math.random()*q.length);

        if(answer!=q[i]){
            ans.add(q[i]);
        }
    }

    ans = Array.from(ans);
    ans[Math.floor(Math.random()*3)] = answer;

    return ans
}

/** Returns a DOM element that is the binary representation of binary string. string (binary string),color -> color , forDiv (where to add) -> DOM */
function binarycreate(string,color,forDiv){
    var psa = document.createElement('p');

    for(let i=0;i<string.length;i++){

        var pk = document.createElement('p');

        if (i==0 && (!forDiv)){
            pk.className="first";
        }
        else if (i==string.length-1 && forDiv) {
            pk.className="first";
        }
        else{
            pk.className="not-first";
        }

        pk.innerHTML=`1`;                       
         
        pk.style.color="rgba(255, 255, 255, 0)";
        pk.style.border='1px solid black';

        if (string[i]=="1"){
            pk.style.backgroundColor=color;
        }
        else{
            pk.style.backgroundColor="white";
        }

        psa.appendChild(pk)
    }

    psa.style.display='inine-flex';

    return psa
}

/** Makes bit of each step and add them into their respective column. m,ac,q,q1 -> DOM (table) {For Booth's cause it's different}*/
function bit(m,ac,q,q1){
    m.appendChild(binarycreate(result[cnt].m,"green",false));
    ac.appendChild(binarycreate(result[cnt].ac,"blue",false));
    q.appendChild(binarycreate(result[cnt].q,"red",false));
    q1.appendChild(binarycreate(result[cnt].q1,"orange",false));
}

/** Makes bit of each step and add them into their respective column. m,ac,q -> DOM (table) {For Restoring/Non cause they same}*/
function bitDiv(m,ac,q){
    m.appendChild(binarycreate(result[cnt].m,"green",true));
    ac.appendChild(binarycreate(result[cnt].ac,"blue",true));
    q.appendChild(binarycreate(result[cnt].q,"red",true));
}

/** Changes the color of bit representation (qcol {first/last bit}) in case of right/left arithemtic shift. result -> answers (has the info if a bit has been shifted to another column (AFlag,Qflag) ), cnt (the index of answers in all the step) -> integer */
function colchange(result,cnt){
    var qcol=document.querySelectorAll('.first');

    if (result[cnt].act=="Direct Right Arithmetic Shift" || result[cnt].act=="Right Arithmetic Shift"){
        if (result[cnt].Aflag){
            qcol[qcol.length-2].style.backgroundColor="blue";
        }

        if (result[cnt].Qflag){
            qcol[qcol.length-1].style.backgroundColor="red";
        }
    }

    if (result[cnt].act=="Left Arithmetic Shift"){
        if (result[cnt].Aflag){
            qcol[qcol.length-2].style.backgroundColor="red";
        }
    }
}

/** Returns which gate is been used. gate_1 -> string. Eg: AND Gate (input) => and (return) */
function gate(gate_1){
    var fgate='';
    fgate = gate_1.split(" ");
    fgate = fgate[0];
    fgate = fgate.toLowerCase();

    return fgate;
}

/** Hides a DOM. all -> DOM */
function hide(all){
    all.style.display = 'none';
}

/** Reveals a DOM. all -> DOM */
function reveal(all){
    all.style.display = 'block';
}

/** Returns decimal of a binary. string -> string */
function asd(string){

    var sum=0;

    for(let i=string.length-1;i>0;i--){
        if (string[i]=='1'){
            sum+=po(string.length-1-i);
        }

    }

    if(string[0]=='1'){
        c = po(string.length-1);
        return - (c - sum);
    }
        
    return sum
}

/** Returns the binary bit count of decimal. num -> number*/
function bitcnt(num){
    let n=0
    abQ = ab(num)
    while (true) {
        b = po(n);
        if (abQ >= b) {
            n += 1;
        } 
        else {
            break;
        }
    }
    return n
}

/** Perform bcd (2's complement on M). M -> integer */
function bcd(M){
    let abM = ab(M);
    let negM = less(M);
    let c = po(bitcnt(M));

    if(negM==1){
        return (c - abM)
    }
    else{
        return M
    }
}

/** Used for generating questions for logic gates (also hides logic gates when first loaded). A,sim -> DOM  */
function generateRandomValues(A,sim) {
    const randomInputA = Math.floor(Math.random() * 2);
    const randomInputB = Math.floor(Math.random() * 2);
    const tab = document.querySelector('.tab1');
    const randomGateIndex = Math.floor(Math.random() * 5);
    const gates = ['NAND Gate', 'NOT Gate','AND Gate','OR Gate','NOR Gate','XNOR Gate','XOR Gate'];
    const randomGate = gates[randomGateIndex];

    document.getElementById('inputA').value = randomInputA;
    document.getElementById('inputB').value = randomInputB;
    document.getElementById('gateSelector').value = randomGate;

    if (A){
        hide(sim);
        hide(tab);
        hide(ta);
        document.getElementById('table1').innerHTML = ``;
    }
}

/** Used for displaying logic gates to denote the answers. sim -> DOM  */
function checkAnswer(sim) {
    var inputValA = parseInt(document.getElementById('inputA').value);
    var inputValB = parseInt(document.getElementById('inputB').value);
    var userOutput  = parseInt(document.getElementById('output').value);
    var selectedGate = document.getElementById('gateSelector').value;
    const tab = document.querySelector('.tab1');
    
    let correctOutput = false;

    correctOutput = gate2(selectedGate,inputValA,inputValB)

    gatesdisplay1(sim,inputValA,inputValB,correctOutput,gate(selectedGate));
    reveal(sim);
    reveal(tab);
    reveal(ta);
    const newRow = document.createElement('tr');
    if(selectedGate == 'not'){
        inputValB = '-';
    }

    newRow.innerHTML = `
        <td>${inputValA}</td>
        <td>${inputValB}</td>
        <td>${selectedGate.toUpperCase()}</td>
        <td>${correctOutput}</td>
        <td>${userOutput}</td>
        <td id='this_one' class="${correctOutput === userOutput ? 'correct' : 'incorrect'}">${correctOutput === userOutput ? 'Correct' : 'Incorrect'}</td>
    `;
    table1.appendChild(newRow);
    generateRandomValues(false,sim);

}

/** Used to generate random inputs,gates for theory page. c -> DOM div array  */
function randomGate(c){
    const arr = ['AND Gate','OR Gate','NOT Gate','NOR Gate','XOR Gate'];
    var randomInputA,randomInputB,out;
    for(let i=0;i<5;i++){
        randomInputA = Math.floor(Math.random() * 2);
        randomInputB = Math.floor(Math.random() * 2);
        out = gate2(arr[i],randomInputA,randomInputB);
        gatesdisplayun(c[i],randomInputA,randomInputB,out,gate(arr[i]));
    }
}

/** Used to displaying the random inputs,gates for theory page. sim -> DOM (div), A,B,Output,C -> integer, Gate1,Gate2-> string (logic gate)  */
function gatesdisplayun(sim,A,B,Output,Gate){
    if(Gate == 'not'){
                sim.innerHTML = `<table class="tab">
        <tr>
            <th rowspan="3"><p id="A1" style="padding-top: 5px;margin-top:5px">${A}</p></th>
            <th rowspan="3"><img id ="img1" src ="../../../../images/gates/${Gate}/${A}${B}.png" height="150px" width="250px" style="margin-right: 5x;" draggable="false"></th>
            <th rowspan="3"><p id="out1" style="padding-top: -10px;margin-top:10px;">${Output}</p></th>
        </tr>
        </table>
        <th><p id="B1" style="padding-top: -10px;margin-top:0px;display:none;user-select: none;">${B}</p></th>`;

    }
    else{
        sim.innerHTML = `<table class="tab">
                <tr>
                <th rowspan="1"><p id="A1" style="padding-top: 15px; margin-top:20px;">${A}</p></th>
                <th rowspan="3"><img id ="img1" src ="../../../../images/gates/${Gate}/${A}${B}.png" height="150px" width="250px" style="margin-right: 5x;" draggable="false"></th>
                <th rowspan="3"><p id="out1" style="padding-top: 0px;">${Output}</p></th>
            </tr>
            <tr>
                <th><p id="B1" style="padding-top: -5px; margin-top:15px;">${B}</p></th>
            </tr>
            <tr>
                <th style="-ms-user-select: none;user-select: none;color: white;">1</th>
            </tr>

            </table>`;
        }

    var A1 = document.querySelectorAll('#A1');
    var B1 = document.querySelectorAll('#B1');
    var out1 = document.querySelectorAll('#out1');

    var a1 = A1[A1.length-1]
    var b1 = B1[B1.length-1]
    var c1 = out1[out1.length-1]

    colorchange(A,a1);
    colorchange(B,b1);
    colorchange(Output,c1);

}

/** Used to fetch logic gate question which was fetched from database and returns a function to display them. 

    Dead Function ahead. May the soul be at peace.

    async function createquestionLogic(){
        const response = await fetch('../../../../databaseinfo/main/answer.json');
        const json = await response.json();
        return questionConstruct(json);
    }

*/

/** Displays each question (bank) and returns the answer. bank -> dictionary with question,options,answer */
function questionConstruct(bank){
    var ans = document.getElementById('answers');
    var answer = {};
    var quest;
    var i = 1;
    bank.forEach(branch => {
        quest = document.createElement('li');
        quest.innerHTML = `<p>${branch['Question']}</p>
        <input type="radio" name="q${i}" value="a"> ${branch['options'][0]} <br>
        <input type="radio" name="q${i}" value="b"> ${branch['options'][1]} <br>
        <input type="radio" name="q${i}" value="c"> ${branch['options'][2]} <br>
        <input type="radio" name="q${i}" value="d"> ${branch['options'][3]} <br>
        <p class="feedback"></p>`;
        ans.appendChild(quest);
        let q = 'q'+String(i);
        answer[q] = branch['ans'];
        i+=1

    });

    return answer;
}



/** Checks if input string is empty or not and return None if empty else the string itself. string -> string */
function checkEmpty(string){
    if(string==""){
        return "No Feedback (Yes! There is no feedback by this person)";
    }
    else{
        return string;
    }
}

/** Generates a table for every user feedback (admin).index,exp,rating -> int, user,feed -> string, one -> table DOM */
function app_admin(index,user,exp,rate,feed,one){
    const row = document.createElement('tr');
    row.innerHTML = `
                    <th>${index+1}</th>
                    <th name="user">${user}</th>
                    <th>${expName[exp]}</th>
                    <th id=rate${index}>${rate}/15</th>
                    <th id=feed${index}>${checkEmpty(feed)}</th>
                    <th>
                    <div class='actions'>
                    <button data-user=${user} data-exp=${exp} data-index=${index} class="edit">Edit</button>
                    <form action='../../del/del_row.php' method='post' onsubmit='return deleteAlert();'>
                    <input type='text' name='path' id='path' value='review' readonly style='display:none;' readonly>
                    <input type="text" name="user" id="user${index}" value = ${user} style='display:none;' readonly>
                    <input type="text" name="exp" id="exp${index}" value = ${exp} style='display:none;' readonly>
                    <input type="submit" name="submit" value="Delete">
                    </form>
                    </div>
                    </th>`;
    one.appendChild(row);

}

/** Generates a table for every user feedback. rate -> int, user,feed,exp -> string, one -> div DOM */
function app(user,rate,exp,feed,one){
    const row = document.createElement('div');
    row.className = 'one';

    if(feed==""){
    row.innerHTML = `
                    <div class="user">${user}</div>
                    <div class="rate">${rate}★</div>
                    <div class="exp">${exp}</div><br>`;
    }
    else{
    row.innerHTML = `
                    <div class="user">${user} </div>
                    <div class="rate">${rate}★</div>
                    <div class="exp">${exp}</div><br>
                    <div class="feed">${feed}</div>`;
    }

    one.appendChild(row);

}

/** clears a form. form -> form DOM */
function clearForm(form){
    var element = form.elements;
    for(let i=0;i<element.length;i++){
        if (!(element[i].type=='submit' || element[i].type=='button' )){
        element[i].value = '';
        }
    }
}

/** fetches user data (rating,feedback,username) from table and button attribute. element -> button DOM*/
function fetchdata(element){
    
    var exp=element.getAttribute('data-exp');
    var user=element.getAttribute('data-user');
    var index=element.getAttribute('data-index');
    var feed = document.getElementById('feed'+index).innerHTML;
    var rating = document.getElementById('rate'+index).innerHTML;

    if(feed=="No Feedback (Yes! There is no feedback by this person)"){
        feed="";
    }
    edit_exp.value = expName[exp];
    edit_name.value = user;
    edit_feed.value = feed;
    edit_rating.value = parseInt(rating.slice(0,rating.length-3));
}

/** fetches logic question data (rating,feedback,username) from table and button attribute. element -> button DOM*/
function fetchLogic(element){
    
    var index=element.getAttribute('data-index');
    var options = [];
    var answers = document.getElementById('ans'+index).innerHTML;
    var question = document.getElementById('ques'+index).innerHTML;

    for(let i=0;i<4;i++){
        options[i] = document.getElementById('opt'+i+index).innerHTML;
    }

    edit_index.value = index;
    edit_opt1.value = options[0];
    edit_opt2.value = options[1];
    edit_opt3.value = options[2];
    edit_opt4.value = options[3]
    edit_ans.value = answers;
    edit_ques.value = question;
}

/** Generates a table for every logic question (admin).index,rating,sr -> int, ques,ans -> string, option -> list[string], one -> table DOM */
function app_logic(sr,index,ques,option,answer,one){
    const row = document.createElement('tr');
    row.innerHTML = `
                    <th>${sr+1}</th>
                    <th id=ques${index}>${ques}</th>
                    <th id=opt0${index}>${option[0]}</th>
                    <th id=opt1${index}>${option[1]}</th>
                    <th id=opt2${index}>${option[2]}</th>
                    <th id=opt3${index}>${option[3]}</th>
                    <th id=ans${index}>${answer}</th>
                    <th>
                    <div class='actions'>
                    <button data-index=${index} class="edit">Edit</button>
                    <form action='../../del/del_row.php' method='post' onsubmit='return deleteAlert();'>
                    <input type='text' name='path' id='path' value='logicq' readonly style='display:none;' readonly>
                    <input type="text" name="index" value = ${index} style='display:none;' readonly>
                    <input type="submit" name="submit" value="Delete">
                    </form>
                    </div>
                    </th>`;
    one.appendChild(row);

}

/**causes a confirm box for various decesion */
function deleteAlert(){
    let text = 'Are you sure about this';

    if(confirm(text)==true){
        console.log('ok');
        return true;
    }
    else{
        console.log('no ok')
        return false;
    }
}

/** Draws an encoder on ctx canvas, displays inside div div and also display current output in p DOM.p -> DOM (<p>), n,active {0<=active<2^n} -> int, ctx -> canvas */
function drawEncoder(active,canvas,n,div=-1,p=-1){
    
    let x_pos = 0;
    const ctx = canvas.getContext('2d');
    var encode_height = 20*Math.pow(2,n);
    var active_set = [];
    
    canvas.width = 650;
    canvas.height = encode_height+100;
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    var height = canvas.height;
    var start = [200,(height-encode_height)/2];

    try{
        if(active<-1 || active>=Math.pow(2,n)){
            throw new wrongInput("input's binary representation has more than or less than "+n+"bits and max value of n is 8");
        }

        ctx.fillStyle = '#cccccc';
        ctx.fillRect(200, (height-encode_height)/2, 200, encode_height);
        ctx.strokeRect(200, (height-encode_height)/2, 200, encode_height);

        var off = 10;
        var diff = Math.round(encode_height/(n+1));
        ctx.lineWidth = 10;
        ctx.font = '16px Arial';

        for(let i=0;i<Math.pow(2,n);i++){

            if(active==i){
                ctx.strokeStyle = 'green';
                ctx.fillStyle = 'green';
            }
            else{
                ctx.strokeStyle = 'red';
                ctx.fillStyle = 'red';
            }

            ctx.beginPath();
            ctx.moveTo(start[0],start[1]+off);
            ctx.lineTo(start[0]-100,start[1]+off);
            ctx.stroke();

            if(i>=100){
                x_pos = 8;
            }
            else if(i<10){
                x_pos = -8
            }
            else{
                x_pos = 0;
            }

            ctx.fillText('Input '+(i), 40-x_pos, start[1]+off+5);
            off+=20;
        }

        ans = binary(Math.max(0,active),n);

        off = diff;
        
        for(let i=0;i<n;i++){

            if(active==-1){
                ctx.strokeStyle = 'black';
                ctx.fillStyle = 'black';

                ctx.beginPath();
                ctx.moveTo(start[0]+200,start[1]+off);
                ctx.lineTo(start[0]+300,start[1]+off);
                ctx.stroke();
                ctx.fillText('X', 510, start[1]+off+5);
                off+=diff;
                continue;
            }

            if(ans[n-1-i]=='1'){
                ctx.strokeStyle = 'green';
                ctx.fillStyle = 'green';
                active_set.push(i);
            }
            else{
                ctx.strokeStyle = 'red';
                ctx.fillStyle = 'red';
            }
            ctx.beginPath();
            ctx.moveTo(start[0]+200,start[1]+off);
            ctx.lineTo(start[0]+300,start[1]+off);
            ctx.fillText('Output '+(i), 510, start[1]+off+5);
            ctx.stroke();

            off+=diff;
        }

        ctx.font = '20px Arial';
        ctx.fillStyle = '#000';
        ctx.fillText('Encoder', 260, height/2+5);

        if(div!=-1){
            div.style.width = '650px';
            div.style.height = (min(400,canvas.height))+'px';
        }

        if(p!=-1){
            activeFeed(p,active_set);
        }

    }
    catch(error){
        console.log(error);
    }
}


/** Draws an Decoder on ctx canvas inside div div and also display current output in p DOM.p -> DOM (<p>), div -> div, input, n -> int, ctx -> canvas */
function drawDecoder(input,canvas,n,div=-1,p=-1){

    const ctx = canvas.getContext('2d');
    var decode_height = 20*Math.pow(2,n);
    
    canvas.width = 650;
    canvas.height = decode_height+100;
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    var height = canvas.height;
    var start = [200,(height-decode_height)/2];
    var ans = asd('0'+input);

    try{
        if(input.length>n || input.length<n || n>8){
            throw new wrongInput("active should be in range(0,"+(Math.pow(2,n)-1)+")");
        }
        
        ctx.fillStyle = '#cccccc';
        ctx.fillRect(200, (height-decode_height)/2, 200, decode_height);
        ctx.strokeRect(200, (height-decode_height)/2, 200, decode_height);
        
        ctx.lineWidth = 10;
        ctx.font = '16px Arial';

        var off = Math.round(decode_height/(n+1));
        var diff = off;

        for(let i=0;i<n;i++){

            if(input[n-1-i]=='1'){
                ctx.strokeStyle = 'green';
                ctx.fillStyle = 'green';
            }
            else{
                ctx.strokeStyle = 'red';
                ctx.fillStyle = 'red';
            }

            ctx.beginPath();
            ctx.moveTo(start[0],start[1]+off);
            ctx.lineTo(start[0]-100,start[1]+off);
            ctx.fillText('Input '+(i), 40, start[1]+off+5);
            ctx.stroke();

            off += diff;
        }

        off = 10

        for(let i=0;i<Math.pow(2,n);i++){

            if(ans==i){
                ctx.strokeStyle = 'green';
                ctx.fillStyle = 'green';
            }
            else{
                ctx.strokeStyle = 'red';
                ctx.fillStyle = 'red';
            }

            ctx.beginPath();
            ctx.moveTo(start[0]+200,start[1]+off);
            ctx.lineTo(start[0]+300,start[1]+off);
            ctx.fillText('Output '+(i), 510, start[1]+off+5);
            ctx.stroke();
            off+=20;
        }

        ctx.font = '20px Arial';
        ctx.fillStyle = '#000';
        ctx.fillText('Decoder', 260, height/2+5);

        if(div!=-1){
            div.style.width = '650px';
            div.style.height = (min(400,canvas.height))+'px';
        }

        if(p!=-1){
            activeFeed(p,[ans]);
        }
    }
    catch(error){
        console.log(error);
    }
}

/** shows the active output for encoder and decoder */
function activeFeed(p,active){
    var msg = '';
    n=active.length;

    if(n==0){
        msg = 'None';
    }
    else if(n==1){
        msg = 'Output '+active[0];
    }
    else{
        msg = 'Output '+active[0];
        for(let i=1;i<active.length;i++){
            msg += ', Output '+active[i];
        }
    }

    p.innerHTML = `<b>Current Output:</b> ${msg}.`;
        
}

/** A custom error for custom functions. msg -> string */
function wrongInput(msg){
    this.msg = msg;
} 

wrongInput.prototype = Error.prototype;

/** Used for dynamic options for all types of encoder. input_area -> select DOM, size -> int */
function generate_input(input_area,size){
    limit = parseInt(size.value);
    input_area.innerHTML = ``;
    for(let i=-1;i<Math.pow(2,limit);i++){
        var opt = document.createElement('option');

        if(i==-1){
            opt.innerHTML = `None`;
        }
        else{
            opt.innerHTML = `${i}`;
        }

        opt.value = i;

        input_area.appendChild(opt);
    }
}

/** Fetches the current input. size -> int */
function decoderDraw(size){
    var binary = document.querySelectorAll('#In_de');
    var binary_form = new Array(size);
    for(let i of binary){
        if(i.checked){
            binary_form[parseInt(i.value)] = '1';
            document.getElementById('status'+i.value).style.color = 'green';
        }
        else{
            binary_form[parseInt(i.value)] = '0';
            document.getElementById('status'+i.value).style.color = 'red';

        }
    }

    return binary_form;
}

/** Renders decoder on canvas canvas inside div div and does all necessary things. table_head,table_body -> table DOM, canvas -> canvas, div -> div, p-> DOM, size -> int*/
function renderDecoder(table_head,table_body,canvas,size,div,p){

    decoder_table(table_head,table_body,size);
    opt = document.querySelectorAll('#In_de');
    
    opt.forEach(check =>{
        check.addEventListener('click',()=>{
            var bina = Array.from(decoderDraw(size)).reverse().join('');
            drawDecoder(bina,canvas,size,div,p);
        });
    });
    var first = Array.from(decoderDraw(size)).reverse().join('');

    drawDecoder(first,canvas,size,div,p);
    reveal(div);
}

/** Generates a dynamic input checkbox table. table_head,table_body -> table DOM, size -> int*/
function decoder_table(table_head,table_body,size){

    var row = document.createElement('tr');
    table_body.innerHTML = ``;
    table_head.innerHTML = ``;

    for(let i =0;i<size;i++){
        var col = document.createElement('th');
        col.innerHTML = `Input ${i}`;
        col.id='status'+i;
        row.appendChild(col);
    }

    table_head.appendChild(row);
    row = document.createElement('tr');

    for(let i =0;i<size;i++){
        var col = document.createElement('th');
        var button = document.createElement('input');
        button.type='checkbox';
        button.name = 'In_de';
        button.id = 'In_de';
        button.value = i;
        col.appendChild(button);
        row.appendChild(col);
    }
    table_body.appendChild(row);

}

/** Makes arrow change state to active (clickable and visible) */
function switchOnArrow(arrow){
    var classN = String(arrow.className).split(' '); 
    classN[2] = 'white';
    arrow.className = classN.join(' ');
    arrow.disabled = false;
}

/** Makes arrow change state to deactive (not clickable and not visible) */
function switchOffArrow(arrow){
    classN = String(arrow.className).split(' '); 
    classN[2] = 'black';
    arrow.className = classN.join(' ');
    arrow.disabled = true;
}
 
/** Hanfles the rating bar chart */
function chartVerticalMake(rating) {
    var total = Math.max(1,(rating[3] + rating[6] + rating[9] + rating[12]));

    for(let i=0;i<4;i++){
        document.querySelector('.bar-'+i).style.width = 100*rating[(i+1)*3]/total + "%";
        document.getElementById('r'+i).innerHTML = `${rating[(i+1)*3]}`;
    }

}

/** Handles the overall rating  */
function angle_calculate(scores){

    let arc = scores*24;
    let last = parseInt(String(getComputedStyle(root).getPropertyValue('--arc')).split('deg')[0]);
    root.style.setProperty('--color',specColors[choice]);
    let i = last;

    /** progress is present in main file to ensure consistency and ensure single thread operation */
    progress = setInterval(() => {

        if(last>arc){
            i-=1;
        }
        else{
            i+=1;
        }
        
        
    root.style.setProperty('--arc', i + 'deg');
    j=parseInt(15*i/(360));

    score.innerHTML= `${j}/15`;

    if(i==arc || i>360 || i<0){
        clearInterval(progress);
    }

    }, 7);
    
}

/** Generates a table for every user which want to be admin.index -> int,user,email -> string, one -> table DOM */
function app_join(index,user,email,one){
    const row = document.createElement('tr');
    row.innerHTML = `
                    <th>${index+1}</th>
                    <th name="user">${user}</th>
                    <th>${email}</th>
                    <th>
                    <div class='actions'>
                    <form action='../../add/add_admin.php' method='post' onsubmit='return deleteAlert();'>
                    <input type='text' name='path' id='path' value='req' readonly style='display:none;'>
                    <input type="text" name="admin" id="admin" value = ${user} style='display:none;' readonly>
                    <input type="submit" name="submit" value="Add">
                    </form>

                    <form action='../../del/del_row.php' method='post' onsubmit='return deleteAlert();'>
                    <input type='text' name='path' id='path' value='req' readonly style='display:none;' readonly>
                    <input type="text" name="admin" id="admin" value = ${user} style='display:none;' readonly>
                    <input type="text" name="mail" id="mail" value = ${email} style='display:none;' readonly>
                    <input type="submit" name="submit" value="Delete">
                    </form>
                    </div>
                    </th>`;
    one.appendChild(row);

}

/** Draws an DeMUX on ctx canvas inside div div and also display current output in p DOM.p -> DOM (<p>), div -> div, active -> binary string{Eg.1010 for n=4}, n -> int, ctx -> canvas */
function drawMUX(active,canvas,n,div=null,p=null){
    
    let x_pos = 0;
    const ctx = canvas.getContext('2d');
    var mux_height = 20*Math.pow(2,n);
    var mux_width = Math.max(200,30*n);
    
    canvas.width = mux_width+450;
    canvas.height = mux_height+250;
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    var height = canvas.height;
    var start = [200,(height-mux_height)/2+50];
    var end = [200+mux_width,(height-mux_height)/2+50];
    var ans = asd('0'+active);

    try{
        if(active.length>n || active.length<n || n>8){
            throw new wrongInput("input's binary representation has more than or less than "+n+"bits and max value of n is 8");
        }

        ctx.fillStyle = '#cccccc';
        ctx.fillRect(start[0], (height-mux_height)/2+50, mux_width, mux_height);
        ctx.strokeRect(start[0], (height-mux_height)/2+50, mux_width, mux_height);

        var off = Math.round(mux_width/(n+1));
        var diff = Math.round(mux_width/(n+1));
        ctx.lineWidth = 10;
        ctx.font = '16px Arial';

        for(let i=0;i<n;i++){
          if(active[n-i-1]=='1'){
                ctx.strokeStyle = 'green';
                ctx.fillStyle = 'green';
          }
          else{
              ctx.strokeStyle = 'red';
              ctx.fillStyle = 'red';
          }

            ctx.beginPath();
            ctx.moveTo(start[0]+off,start[1]);
            ctx.lineTo(start[0]+off,start[1]-100);
            ctx.fillText('S'+(i), start[0]+off-10, start[1]-110);
            ctx.stroke();

            off+=diff;
        }

        off=10;
        for(let i=0;i<Math.pow(2,n);i++){

            if(ans==i){
                ctx.strokeStyle = 'green';
                ctx.fillStyle = 'green';
            }
            else{
                ctx.strokeStyle = 'red';
                ctx.fillStyle = 'red';
            }

            if(i>=100){
                x_pos = 8;
            }
            else if(i<10){
                x_pos = -8
            }
            else{
                x_pos = 0;
            }

            ctx.beginPath();
            ctx.moveTo(start[0],start[1]+off);
            ctx.lineTo(start[0]-100,start[1]+off);
            ctx.fillText('Input '+(i), 40-x_pos, start[1]+off+5);
            ctx.stroke();
            
            off+=20;
        }

        ctx.strokeStyle = 'green';
        ctx.fillStyle = 'green';

        off = Math.round(mux_height/(2));
        ctx.beginPath();
        ctx.moveTo(end[0],end[1]+off);
        ctx.lineTo(end[0]+100,end[1]+off);
        ctx.fillText('Output (Input '+(ans)+')', end[0]+110, end[1]+off+5);
        ctx.stroke();

        off+=Math.round(mux_height/(n+1));
    
        ctx.font = '20px Arial';
        ctx.fillStyle = '#000';
        ctx.fillText('MUX', 200+mux_width/2-22, height/2+55);

        if(div!=null){
            div.style.width = Math.min(mux_width+450,650)+'px';
            div.style.height = (min(400,canvas.height))+'px';
        }

        if(p!=null){
            p.innerHTML = `Input ${ans} redirected as Output.`;
        }

    }
    catch(error){
        console.log(error);
    }
}

/** Draws an DeMUX on ctx canvas inside div div and also display current output in p DOM.p -> DOM (<p>), div -> div, active -> binary string{Eg.1010 for n=4}, n -> int, ctx -> canvas */
  function drawDeMUX(active,canvas,n,div=null,p=null){

    const ctx = canvas.getContext('2d');
    var mux_height = 20*Math.pow(2,n);
    var mux_width = Math.max(200,30*n);
    
    canvas.width = mux_width+450;
    canvas.height = mux_height+250;
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    var height = canvas.height;
    var start = [200,(height-mux_height)/2+50];
    var end = [200+mux_width,(height-mux_height)/2+50];
    var ans = asd('0'+active);

    try{
        if(active.length>n || active.length<n || n>8){
            throw new wrongInput("input's binary representation has more than or less than "+n+"bits and max value of n is 8");
        }

        ctx.fillStyle = '#cccccc';
        ctx.fillRect(start[0], (height-mux_height)/2+50, mux_width, mux_height);
        ctx.strokeRect(start[0], (height-mux_height)/2+50, mux_width, mux_height);

        var off = Math.round(mux_width/(n+1));
        var diff = Math.round(mux_width/(n+1));
        ctx.lineWidth = 10;
        ctx.font = '16px Arial';

        for(let i=0;i<n;i++){
          if(active[n-i-1]=='1'){
                ctx.strokeStyle = 'green';
                ctx.fillStyle = 'green';
          }
          else{
              ctx.strokeStyle = 'red';
              ctx.fillStyle = 'red';
          }

            ctx.beginPath();
            ctx.moveTo(start[0]+off,start[1]);
            ctx.lineTo(start[0]+off,start[1]-100);
            ctx.fillText('S'+(i), start[0]+off-10, start[1]-110);
            ctx.stroke();

            off+=diff;
        }

        off=10;

        for(let i=0;i<Math.pow(2,n);i++){

            if(ans==i){
                ctx.strokeStyle = 'green';
                ctx.fillStyle = 'green';
            }
            else{
                ctx.strokeStyle = 'red';
                ctx.fillStyle = 'red';
            }

            ctx.beginPath();
            ctx.moveTo(end[0],end[1]+off);
            ctx.lineTo(end[0]+100,end[1]+off);
            ctx.fillText('Output '+i, end[0]+110, start[1]+off+5);
            ctx.stroke();
            
            off+=20;
        }

        off = Math.round(mux_height/(2));
        
        ctx.strokeStyle = 'green';
        ctx.fillStyle = 'green';

        ctx.beginPath();
        ctx.moveTo(start[0],start[1]+off);
        ctx.lineTo(start[0]-100,start[1]+off);
        ctx.fillText('Input', 60, start[1]+off+5);
        ctx.stroke();

        off+=Math.round(mux_height/(n+1));
    

        ctx.font = '20px Arial';
        ctx.fillStyle = '#000';
        ctx.fillText('DeMUX', 200+mux_width/2-30, height/2+55);

        if(div!=null){
            div.style.width = Math.min(mux_width+450,650)+'px';
            div.style.height = (Math.min(400,canvas.height))+'px';
        }

        if(p!=null){
            p.innerHTML = `Input redirected to Output ${ans}.`;
        }

    }
    catch(error){
        console.log(error);
    }
}

/** Changes the select option when there is a switch between MUX and DeMUX.select -> select DOM,n -> int,type -> string (MUX|DeMUx),name -> DOM,title -> p DOM */
function selectOpt(select,n,type,name){
    select.innerHTML = ``;
    name.innerHTML = `Enter type of ${type}:`;
    for(let i=1;i<=n;i++){
        var opt = document.createElement('option');
        opt.value = i;

        switch(type){
            case 'MUX': opt.innerHTML = `${Math.pow(2,i)}:1`;break;
            case 'DeMUX': opt.innerHTML = `1:${Math.pow(2,i)}`;break;
        }
        
        select.appendChild(opt);
    }
}

/** Generates a dynamic input checkbox table. size -> int*/
function S_table(size){
    table_head.innerHTML = ``;
    table_body.innerHTML = ``;
    var row = document.createElement('tr');

    for(let i=0;i<size;i++){
        var th = document.createElement('th');
        th.innerHTML = `S<sub>${i}</sub>`;
        th.id='status'+i;
        row.appendChild(th);
    }

    table_head.appendChild(row);
    row = document.createElement('tr');

    for(let i =0;i<size;i++){
        var col = document.createElement('th');
        var button = document.createElement('input');
        button.type='checkbox';
        button.name = 'Inp'+i;
        button.id = 'Inp';
        button.value = i;
        col.appendChild(button);
        row.appendChild(col);
    }
    table_body.appendChild(row);
}

/** Adds eventlistener for every input */
function listenButton(){
    var options = document.querySelectorAll('#Inp');

    options.forEach(opt =>{
        opt.addEventListener('click', ()=>{
            drawThing(topic);
        })
    });
}

/** Checks every input and then draws the corresponding figure. type -> string(MUX|DeMUX) */
function drawThing(type){
    var options = document.querySelectorAll('#Inp');
    var input = '';

    for(let i=0;i<options.length;i++){
        if(options[i].checked){
            input += '1';
            document.getElementById('status'+i).style.color='green';
        }
        else{
            input += '0';
            document.getElementById('status'+i).style.color='red';
        }
    }

    input = Array.from(input).reverse().join('');

    switch(type){
        case 'MUX': drawMUX(input,canvas,parseInt(select.value),div=dive,p=feed);break;
        case 'DeMUX': drawDeMUX(input,canvas,parseInt(select.value),div=dive,p=feed);break;
    }
}

/** Generates a random questions on either MUX and DeMUX and also generates the table to display the question. size -> int */
function newQuesTable(size){

    let which = Math.random()+0.1>0.5? 1:0;

    tableHead.innerHTML = `<th style="border-left: 1px solid black">Sr. No.</th><th>Type</th><th>Size</th>`;
    quesRow.innerHTML=`<td id="index">${index}.</td><td id="type">${type[which]}</td><td id="size">${context[type[which]][0]}</td>`

    answer = Math.ceil(Math.random()*Math.pow(2,size-1));
    let randomBinary = binary(answer,size);

    for(let i=size-1;i>=0;i--){
        var newS = document.createElement('td');
        newS.innerHTML = `${randomBinary[size-1-i]}`;
        quesRow.appendChild(newS);
        newS = document.createElement('th');
        newS.innerHTML = `S<sub>${i}</sub>`;
        tableHead.appendChild(newS);
    }

    answerRow.forEach(ans => {ans.colSpan=""+size+3});
    newQuestions(type[which]);

}

/** Generates the 4 options for each question. type -> List[str] */
function newQuestions(type){
    question.innerHTML = `${context[type][1]}`;
    let available = new Set();
    let nums = 4;

    while(available.size<4){
        var opt = Math.ceil(Math.random()*Math.pow(2,size));

        while(opt==answer){
            opt = Math.ceil(Math.random()*Math.pow(2,size));
        }

        available.add(opt);
    }
    available = Array.from(available);
    available[Math.floor(Math.random()*nums)] = answer;
    options.innerHTML = ``;


    for(let i=0;i<nums;i++){
        var radio = document.createElement('input');
        var label = document.createElement('label');
        radio.type='radio';
        radio.value = available[i];
        radio.name='this_is_correct';
        label.htmlFor = 'this_is_correct';
        radio.className = 'this_one';

        switch(type){
            case 'MUX': label.innerHTML = `Input ${available[i]}`; break;
            case 'DeMUX': label.innerHTML = `Output ${available[i]}`; break;

        }
        
        options.appendChild(radio);
        options.appendChild(label);

    }

}

/** Checks if answer is correct or not. If correct, proceed with next question else show user it's wrong */
function checkMUX(){
    var options = document.querySelectorAll('.this_one');
    var flag = 0;
    buttondisabled(submit);
    options.forEach(opt => {
        if(opt.checked && parseInt(opt.value)==answer){
            index+=1;
            click['correct'] += 1;
            let uwu = 3;
            remark.innerHTML = `<p style='color:green'>Correct Answer! Loading next in ${uwu}</p>`;
            ready = setInterval(()=>{
                
                uwu-=1;
                remark.innerHTML = `<p style='color:green'>Correct Answer! Loading next in ${uwu}</p>`;
                
                if(uwu==0){
                    clearInterval(ready);
                    remark.innerHTML = ``;
                    size = Math.ceil(Math.random()*2)+2;
                    newQuesTable(size);
                    submit.className = 'submit';
                    buttonEnGre(submit);
                }
            },1000);

            flag = 1;
            
        }
        else if(opt.checked && parseInt(opt.value)!=answer){
            remark.innerHTML = `<p style='color:red'>Wrong Answer! Try Again</p>`;
            click['wrong'] += 1;
            flag = 1;
            submit.className = 'submit';
            buttonEnGre(submit);
        }
    });

    if(flag){
        click['total'] += 1;
        updateResult(click);
    }
    else{
        submit.className = 'submit';
        buttonEnGre(submit);
        window.alert('Please select one option');
    }

}

/** Updates the score (total attempts,correct answers,wrong answers). click -> dict[str,int] */
function updateResult(click){
    var temp = {'total':0,'correct':0,'wrong':0};
    Object.keys(click).forEach(key => {
        if(click[key]>99){
            temp[key] = ':)';
        }
        else{
            temp[key] = click[key];
        }
    });

    correct.innerHTML = `Correctly Answered: <b>${temp['correct']}</b>`;
    total_tries.innerHTML = `Total Attempts: <b>${temp['total']}</b>`;
    wrong.innerHTML = `Incorrectly Answered: <b>${temp['wrong']}</b>`;
}

/** Makes 2 arrays: all index of '0' and all index of '1'. array -> List[List[int],List[int]] */
function mapOf1(array){
    let with_1 = [],with_0 = [];
    const n = array.length;

    for(let i=0;i<n;i++){
        if(array[i]=='1'){
            with_1.push(Math.pow(2,n-1-i));
        }
        else{
            with_0.push(Math.pow(2,n-1-i));
        }
    }

    return [with_0,with_1];
}

/** A helper function to chose how_many elements from array. array -> List[], how_many -> int */
function randomChoice(array,how_many){

    if(array.length<how_many || new Set(array).size<how_many){
        console.log(' Seriously? Array.length < Your demand. Rejected');
        return null;
    }

    let return_value = new Set();
    let idx = -1;

    while (return_value.size<how_many){
        idx = Math.floor(Math.random()*(array.length))
        return_value.add(array[idx]);
    }

    return Array.from(return_value);
}

/**Generates question for quiz. (If your name starts with either P or A, write documentation of the local functions: status,selectOne. Reward: I will binge slam dunk and hajime no ippo {Promise} ) */
function createMUXtemp(){

    var size = Math.ceil(Math.random()*2)+3;
    var answer = Math.ceil(Math.random()*Math.pow(2,size-1));
    var key = [];

    var status = (answer,size,type,i) => {
        var pool;
        let active = mapOf1(binary(answer,size));
    
        let ans_distri;
        let extra_distri;

        if(size==4){
            pool = randomChoice(active[0].concat(active[1]),4);
            key.push(active[1]);
        }
        else{
            if(active[0].length<active[1].length){
                extra_distri = Math.ceil(Math.random()*active[0].length);
                ans_distri = 4 - extra_distri;
            }
            else{
                ans_distri = Math.ceil(Math.random()*active[1].length);
                extra_distri = 4 - ans_distri;
            }
       
            var anspool = randomChoice(active[1],ans_distri) || [];
            var extrapool = randomChoice(active[0],extra_distri) || [];

            pool = randomChoice(anspool.concat(extrapool),4);
            key.push(anspool);
        }

        
        createMOption(i,size,pool,question[i],binary(answer,size),type,1,'checkbox');
    };

    var selectOne = (answer,size,type,i) => {
        var temp = new Set()
        for(let i=0;i<Math.pow(2,size);i++){
            temp.add(i);
        }

        temp.delete(answer);
        temp = Array.from(temp);

        pool = randomChoice(randomChoice(temp,3).concat(answer),4);
        key.push([answer]);
        createMOption(i,size,pool,question[i],binary(answer,size),type,0,'radio');
    }

    for(let i=0;i<4;i++){

        var size = Math.ceil(Math.random()*2)+3;
        var answer = Math.ceil(Math.random()*Math.pow(2,size-1));

        var question = [`Given is a ${Math.pow(2,size)}:1 MUX, if Input ${answer} is redirected as the Output. Select all the active status signal(s)`,`Given is a ${Math.pow(2,size)}:1 MUX, if given below are the status inputs. Select the input which will be redirected as the Output`,`Given is a 1:${Math.pow(2,size)} DeMUX, if Input is redirected to Output ${answer}. Select all the active status signal(s)`,`Given is a 1:${Math.pow(2,size)} DeMUX, if given below are the status inputs. Select the Output to which the Input will be redirected to.`];

        switch(i){
            case 0: status(answer,size,'MUX',i); break;
            
            case 1: selectOne(answer,size,'MUX',i); break;

            case 2: status(answer,size,'DeMUX',i); break;
            
            case 3: selectOne(answer,size,'DeMUX',i); break;
        }
    }

    return key;
}

/**Generates question for quiz. (If your name starts with either P or A, write documentation of the local functions: status,selectOne. Reward: I will binge slam dunk and hajime no ippo {Promise} ) */
function createENCODEtemp() {
    var size = Math.ceil(Math.random() * 2) + 3;
    var answer = Math.ceil(Math.random() * Math.pow(2, size - 1));
    var key = [];

    var status = (answer, size, type, i) => {
        var pool;
        let active = mapOf1(binary(answer, size));
    
        let ans_distri;
        let extra_distri;

        if (size == 4) {
            pool = randomChoice(active[0].concat(active[1]), 4);
            key.push(active[1]);
        } else {
            if (active[0].length < active[1].length) {
                extra_distri = Math.ceil(Math.random() * active[0].length);
                ans_distri = 4 - extra_distri;
            } else {
                ans_distri = Math.ceil(Math.random() * active[1].length);
                extra_distri = 4 - ans_distri;
            }
       
            var anspool = randomChoice(active[1], ans_distri) || [];
            var extrapool = randomChoice(active[0], extra_distri) || [];

            pool = randomChoice(anspool.concat(extrapool), 4);
            key.push(anspool);
        }

        
        createEOption(i, size, pool, question[i], binary(answer, size), type, 1, 'checkbox');
    };

    var selectOne = (answer, size, type, i) => {
        var temp = new Set();
        for (let i = 0; i < Math.pow(2, size); i++) {
            temp.add(i);
        }

        temp.delete(answer);
        temp = Array.from(temp);

        pool = randomChoice(randomChoice(temp, 3).concat(answer), 4);
        key.push([answer]);
        createEOption(i, size, pool, question[i], binary(answer, size), type, 0, 'radio');
    };

    for (let i = 0; i < 4; i++) {
        var size = Math.ceil(Math.random() * 2) + 3;
        var answer = Math.ceil(Math.random() * Math.pow(2, size - 1));

        var question = [
            `Given is a ${Math.pow(2, size)}:${size} Encoder, if Input ${answer} is the current active input. Select all the active output(s)`,
            `Given is a ${Math.pow(2, size)}:${size} Encoder, if given below are the active outputs. Select the active input`,
            `Given is a ${size}:${Math.pow(2, size)} Decoder, if Output ${answer} is the current active output. Select all the active input(s)`,
            `Given is a ${size}:${Math.pow(2, size)} Decoder, iif given below are the active inputs. Select the active output`
        ];

        switch (i) {
            case 0: status(answer, size, 'Encoder', i); break;
            case 1: selectOne(answer, size, 'Encoder', i); break;
            case 2: status(answer, size, 'Decoder', i); break;
            case 3: selectOne(answer, size, 'Decoder', i); break;
        }
    }

    return key;
}


/** Generates the table of status signal. size -> int, randomBinary -> binary string of size size, which -> string */
function statusTable(size,randomBinary,which){

    var type = {'MUX':{'size':Math.pow(2,size)+':1','what':'S'},'DeMUX':{'size':'1:'+Math.pow(2,size),'what':'S'},'Encoder':{'size': size+':'+Math.pow(2,size),'what':'Output'},'Decoder':{'size': Math.pow(2,size)+':'+size,'what':'Input'}};
    var quesRow = `<td id="type">${which}</td><td id="size">${type[which]['size']}</td>`;
    var tableHead = `<th>Type</th><th>Size</th>`;
    var whatHandler = (type,i) => {
        switch(type){
            case 'MUX': 
            case 'DeMUX': return `<sub>${i}</sub>`; break;
            case 'Encoder': 
            case 'Decoder': return ` ${i}`;break;

        }
    }

    for(let i=size-1;i>=0;i--){
        quesRow += `<td>${randomBinary[size-1-i]}</td>`;
        tableHead += `<th>${type[which].what}${whatHandler(which,i)}</th>`;

    }

    return `<table id="algoTable">
                    <thead>
                        <tr id="heading">${tableHead}
                        </tr>
                    </thead>
                    <tbody><tr id="quesRow">${quesRow}</tr>
                </tbody></table><br>`;

}

/** Makes the entire table,option everything (If your name starts with either P or A, write documentation of the local functions: status,draw. Reward: no JJK brainrot shit from me)*/
function createMOption(i,size,option,question,randomBinary,which,table,input){

    var status = (table,value,which) => {if(table==1){ return `S<sub>${value}</sub>`;} else if(which=='MUX'){ return `Input ${value}`;} else {return `Output ${value}`;}};

    var draw = (table) => {if(table==0){return statusTable(size,randomBinary,which)} else{ return ``;}}

    var opt = `<input type=${input} name="q${i}" value="${option[0]}"> ${status(table,option[0],which)} <br>
           <input type=${input} name="q${i}" value="${option[1]}"> ${status(table,option[1],which)} <br>
           <input type=${input} name="q${i}" value="${option[2]}"> ${status(table,option[2],which)} <br>
           <input type=${input} name="q${i}" value="${option[3]}"> ${status(table,option[3],which)} <br>
           <p class="feedback"></p>`;

    const li = document.createElement('li');
    tab.appendChild
    li.innerHTML = `<p>${question}</p>
                    <br>
                    ${draw(table)}
                    <div class="option"> ${opt} </div>`;


    tab.appendChild(li);
}

/** Handles submission of quiz and updates the remarks for each question */
function submitMUX(count){
    
    var marks = 0;
    var checked = 0;
    const feed = document.querySelectorAll('.feedback');
    const total = document.querySelector('.score');

    for(let i=0;i<4;i++){
        var selectOption = document.getElementsByName('q'+i);
        var flag = 1;
        var checked = false;

        selectOption.forEach(opt => {
            if(opt.checked){
                checked += 1;
                if(!(count[i].includes(parseInt(opt.value)))){
                    flag = 0;
                }
            }});

            if(flag && checked==count[i].length){
                marks+=1;
                feed[i].textContent = 'Correct Answer';
                feed[i].style.color = 'green';
            }
            else if(checked){
                feed[i].textContent = 'Wrong Answer';
                feed[i].style.color = 'red';
            }
            else{
                feed[i].textContent = 'No Answer chosen';
                feed[i].style.color = 'red';
            }

    }


    total.textContent = `You scored ${marks} out of ${count.length}`;
    total.style.color = 'green';

    if(marks>3){
        document.querySelector('.feed-button').style.display = 'block';
    }
    else{
        document.querySelector('.feed-button').style.display = 'none';
    }

}

/** Generates a encoder/decoder table. size->int */
function newEncodeTable(size){
    let which = Math.random()+0.1>0.5? 1:0;

    tableHead.innerHTML = `<th style="border-left: 1px solid black">Sr. No.</th><th>Type</th><th>Size</th>`;
    quesRow.innerHTML=`<td id="index">${index}.</td><td id="type">${type[which]}</td><td id="size">${context[type[which]].size}</td>`

    answer = Math.ceil(Math.random()*Math.pow(2,size-1));
    let randomBinary = binary(answer,size);

    for(let i=size-1;i>=0;i--){
        var newS = document.createElement('td');
        newS.innerHTML = `${randomBinary[size-1-i]}`;
        quesRow.appendChild(newS);
        newS = document.createElement('th');
        newS.innerHTML = `${context[type[which]].what} ${i}`;
        tableHead.appendChild(newS);
    }

    answerRow.forEach(ans => {ans.colSpan=""+size+3});
    newEncode(type[which]);
}

/** Creates questions () for encoder/decoder. type->string */
function newEncode(type){
    question.innerHTML = `${context[type]['ques']}`;
    let available = new Set();
    let nums = 4;

    while(available.size<4){
        var opt = Math.ceil(Math.random()*Math.pow(2,size));

        while(opt==answer){
            opt = Math.ceil(Math.random()*Math.pow(2,size));
        }

        available.add(opt);
    }
    available = Array.from(available);
    available[Math.floor(Math.random()*nums)] = answer;
    options.innerHTML = ``;


    for(let i=0;i<nums;i++){
        var radio = document.createElement('input');
        var label = document.createElement('label');
        radio.type='radio';
        radio.value = available[i];
        radio.name='this_is_correct';
        label.htmlFor = 'this_is_correct';
        radio.className = 'this_one';

        switch(type){
            case 'Encoder': label.innerHTML = `Input ${available[i]}`; break;
            case 'Decoder': label.innerHTML = `Output ${available[i]}`; break;

        }
        
        options.appendChild(radio);
        options.appendChild(label);

    }
}

/** Checks if answer is correct or not. If correct, proceed with next question else show user it's wrong (same as checkMUX())*/
function checkEncode(){
    var options = document.querySelectorAll('.this_one');
    var flag = 0;
    buttondisabled(submit);
    options.forEach(opt => {
        if(opt.checked && parseInt(opt.value)==answer){
            index+=1;
            click['correct'] += 1;
            let uwu = 3;
            remark.innerHTML = `<p style='color:green'>Correct Answer! Loading next in ${uwu}</p>`;
            ready = setInterval(()=>{
                
                uwu-=1;
                remark.innerHTML = `<p style='color:green'>Correct Answer! Loading next in ${uwu}</p>`;
                
                if(uwu==0){
                    clearInterval(ready);
                    remark.innerHTML = ``;
                    size = Math.ceil(Math.random()*2)+2;
                    newEncodeTable(size);
                    submit.className = 'submit';
                    buttonEnGre(submit);
                }
            },1000);

            flag = 1;
            
        }
        else if(opt.checked && parseInt(opt.value)!=answer){
            remark.innerHTML = `<p style='color:red'>Wrong Answer! Try Again</p>`;
            click['wrong'] += 1;
            flag = 1;
            submit.className = 'submit';
            buttonEnGre(submit);
        }
    });

    if(flag){
        click['total'] += 1;
        updateResult(click);
    }
    else{
        submit.className = 'submit';
        buttonEnGre(submit);
        window.alert('Please select one option');
    }
}

/** Makes the entire table,option everything */
function createEOption(i,size,option,question,randomBinary,which,table,input){

    var status = (table,value,which) => {if(table==1 && which=='Encoder'){ return `Output ${value}`;}if(table==1 && which=='Decoder'){ return `Input ${value}`;} else if(which=='Encoder'){ return `Input ${value}`;} else {return `Output ${value}`;}};

    var draw = (table) => {if(table==0){return statusTable(size,randomBinary,which)} else{ return ``;}}

    var opt = `<input type=${input} name="q${i}" value="${option[0]}"> ${status(table,option[0],which)} <br>
           <input type=${input} name="q${i}" value="${option[1]}"> ${status(table,option[1],which)} <br>
           <input type=${input} name="q${i}" value="${option[2]}"> ${status(table,option[2],which)} <br>
           <input type=${input} name="q${i}" value="${option[3]}"> ${status(table,option[3],which)} <br>
           <p class="feedback"></p>`;

    const li = document.createElement('li');
    tab.appendChild
    li.innerHTML = `<p>${question}</p>
                    <br>
                    ${draw(table)}
                    <div class="option"> ${opt} </div>`;


    tab.appendChild(li);
}

/**Does the logic gates exercise score calculation and handles gui. reset->bool */
function logicCount(reset){
    var lastOption = document.querySelectorAll('#this_one');

    stats['total']+=1;
    if(!reset && lastOption[lastOption.length-1].className=='incorrect'){
        stats['wrong']+=1;
    }
    else if(!reset && lastOption[lastOption.length-1].className=='correct'){
        stats['correct']+=1
    }
    else{
        stats = {'correct':0,'wrong':0,'total':0};
    }

    Object.keys(attempts).forEach(tries => {

        if(reset){
            temp='';
        }
        else if(stats[tries]>=99){
            temp=':)';
        }
        else{
            temp=stats[tries];
        }

        attempts[tries].innerHTML = `${temp}`;
    });
}