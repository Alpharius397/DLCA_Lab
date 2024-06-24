/** Finds nth power of 2 */
function po(n) {
    let i = 1;
    for (let k = 0; k < n; k++) {
        i = i * 2;
    }
    return i;
}
/** Returns absolute value of c */
function ab(c) {
    if (c >= 0) {
        return c;
    } else {
        return -c;
    }
}
/** Returns 1 if c is negative */
function less(c) {
    if (c < 0) {
        return 1;
    } else {
        return 0;
    }
}
/** Returns a binary string of N, Cnt is no. of bits */
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
console.log(binary(2),3)
/** Returns max of two values */
function max(M,Q){
    if (M>Q){
        return M;
    }
    else{
        return Q
    }
}
/** Returns min of two values */
function min(M,Q){
    if (M>Q){
        return Q;
    }
    else{
        return M;
    }
}

/** Finds if number is odd */
function odd(a) {
    if (a % 2 === 0) {
        return 0;
    } else {
        return 1;
    }
}
/** Returns a binary string with '_' at end */
function bina(N, Cnt) {
    let i, j = 1,loop = 1;
    let ans="";
    i=N%2;
        N=Math.floor(N/2);
            ans="_"+ans;
    while(N!=0){   
        i=N%2;
        N=Math.floor(N/2);
        ans=String(i)+ans;
        j+=1;
    }
    while(j<=Cnt){
    ans="0"+ans;
    j+=1;
    }
    return ans;
}
    
/** Generates values between 8 and 18 (both included) */
function random(){
    let x = Math.floor(Math.random()*10 + 8);
    let y = Math.floor(Math.random()*10 + 8);
    var list = [];

    while(x==0){
        x = Math.floor(Math.random()*10 + 8);
    }
    while(y==0){
        y = Math.floor(Math.random()*10 + 8);
    }

    if(Math.abs(x)>Math.abs(y)){
        list[1] = y;
        list[0] = x;
    }
    else{
        list[0] = y;
        list[1] = x;
    }

    return list;
}


/** Returns a list with each steps of booth multi */

function booth(M, Q,result) {

    let deck = 0;
    let A = 0;
    let Q1 = 0;
    let flag = 0;
    let n = 0;
    let b, c, d, e;
    let Q0 = 0;
    let abM, abQ;
    let negQ, negM;
    let nQ, nM;
    let loop, count = 1, Cnt;
    let ac, q, r, m;
    let carry;
    let count1 = 1;
    let q1;
    let Aflag,Qflag;

    abM = ab(M);
    abQ = ab(Q);
    negM = less(M);
    negQ = less(Q);

    while (true) {
        b = po(n);
        if (abM >= b) {
            n += 1;
            count += 1;
        } else {
            n=0;
            break;

        }
    }

    while (true) {
        b = po(n);
        if (abQ >= b) {
            n += 1;
            count1 += 1;
        } else {
            break;
        }
    }

    if (count1 >= count){
        count = count1;
        console.log(count1);
    }

    b = po(count - 1); /** Represents the MCB. Eg: 1000 is b for bit count 4 */
    c = po(count);  /** Represent the out of bound bit. Eg: 10000 is c for bit count 4. Used to bring bits back within range*/
    d = c - 1;  /** Represents max value for a bit count. Eg: Eg: 0111 is d for bit count 4 */
    e = b / 2;
    Cnt = count;
    console.log(count);

    nM = (d - abM) + 1; /** BCD 2's comp logic */

    nQ = (d - abQ) + 1; /** BCD 2's comp logic */

    let Morg = M,
        Qorg = Q;
    if (negM === 1 || negQ === 1) {
        if (negM === 1) {
            M = nM;
        }
        if (negQ === 1) {
            Q = nQ;
        }
    }
    while (count != 0) {
        let Morg1 = M,
            Qorg1 = Q;
        loop = 0;
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
            result[deck] = {
                "count": count,
                "m": m,
                "ac": ac,
                "q": q,
                "Q1": q1,
                "act": act
            };
            deck += 1;
        }

        if (Q1 !== Q0) {
            if (Q0 === 1 && Q1 === 0) {
                while (loop !== 2) {
                    if (loop === 0) {
                        if (negM === 1) {
                            A = A + abM;  /** A + M */
                        } else {
                            A = A + (d - M) + 1; /** A - M */

                        }

                        if (A > d) {        /** Range check to ensure A is within the given bits */
                            A = A % c;   
                        }

                        act = "A = A - M";
                    }

                    if (loop === 1) {
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
                            A += b;   /** Preserving the sign of A */
                        }

                        if (Q1==1){
                            Qflag=true;
                        }

                        act = "Right Arithmetic Shift";

                    }
                    loop += 1;

                    ac = binary(A, Cnt);
                    q = binary(Q, Cnt);
                    m = binary(M, Cnt);
                    q1 = Q1.toString()
                    result[deck] = {
                        "count": count,
                        "m": m,
                        "ac": ac,
                        "q": q,
                        "Q1": q1,
                        "act": act,
                        "A": Aflag,
                        "Q": Qflag
                    };
                    deck += 1;
                }
            } else {
                while (loop !== 2) {
                    if (loop === 0) {
                        if (negM === 1) {
                            A = A + nM;
                        } else {
                            A = A + M;
                        }
                        if (A > d) {
                            A = A % c;
                        }

                        act = "A = A + M";
                    }

                    if (loop === 1) {
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

                    }
                    loop += 1;

                    ac = binary(A, Cnt);
                    q = binary(Q, Cnt);
                    m = binary(M, Cnt);
                    q1 = Q1.toString()
                    result[deck] = {
                        "count": count,
                        "m": m,
                        "ac": ac,
                        "q": q,
                        "Q1": q1,
                        "act": act,
                        "A":Aflag,
                        "Q":Qflag
                    };
                    deck += 1;

                }
            }
        } else {
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
            m = binary(M, Cnt);
            q1 = Q1.toString()
            result[deck] = {
                "count": count,
                "m": m,
                "ac": ac,
                "q": q,
                "Q1": q1,
                "act": act,
                "A":Aflag,
                "Q":Qflag
            };
            deck += 1;
        }
        count -= 1;
    }

    r = ac + " " + q;
    result[deck] = result[deck] = {
        "count": count,
        "r": r
    };
}

/** Returns decimal of a binary */
function asd(string){
        var sum=0
        for(let i=string.length-1;i>0;i--){
            if (string[i]=='1'){
                sum+=po(string.length-1-i);
            }

            if ((string[i]=='1') || (string[i]=='0')){
                
            }
            else{
                return 'l'
            }

        }

        if(string[0]=='1'){
        c= po(string.length-1)
        return -(c - sum)
        }
        
    return sum
}
/** Returns the binary bit count of decimal*/
function bitcnt(num){
    let n=0
    abQ = ab(num)
    while (true) {
        b = po(n);
        if (abQ >= b) {
            n += 1;
        } else {
            break;
        }
    }
    return n
}
/** Perform bcd (2's complement on M */
function bcd(M){
    abM = ab(M);
    negM = less(M);
    c = po(bitcnt(M))
    if(negM==1){
        return (c - abM)
    }
    else{
        return M
    }
}

