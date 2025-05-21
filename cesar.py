# Definimos el alfabeto con el que trabajaremos (minúsculas + ñ, sin 'z' al final por error, se puede ajustar)
abc = 'abcdefghijklmnñopqrstuwvyxz'

# Texto completo a cifrar
frase = '''=== KOHQTÑG HKOCN === 
Cvwqt: Eqñcofcowg Igofō Kmctk  
Okxgn fg Ceeguq: Rt0J!d1F0  
Vdkecekóo: ?????????  

--- NC XGTFCF UQDTG ZVK ---  
Gn "ceekfgowg" go gn Nciq Cujk oq hvg wcn.  
Zvk Kmctk, dtknncowg igogwkuwc, gurquc, ñcftg… z ñátwkt.  
Fvtcowg gn gargtkñgowq fg eqowcewq eqo gn Gxcoignkqo Vokfcf-01, Zvk gnkikó xqnvowctkcñgowg hvukqoctug eqo uv oúengq.  
Hvg uv rnco fgufg gn kokekq. Nq jkbq rctc:

- Kowgitct uv cnñc go gn Gxc z rtqwgigt c Ujkolk fgufg fgowtq.
- Gxkwct svg UGGNG vuctc nc Vokfcf-01 eqñq vo ctñc rctc uvu hkogu.
- Cugivtct svg uqnq uv jklq, Ujkolk, rvfkgtc ukoetqokbct eqñrngwcñgowg eqo gnnc.

Zq nc fglé jcegtnq. Oq wvxg gn xcnqt fg fgwgogtnc.

--- TGNCEKÓO EQO UJKOLK ---
Én oq nq ucdg. Én oq fgdg ucdgtnq.
Rgtq ecfc xgb svg ug ukgowc go nc eáruvnc, oq guwá uqnq.
Uv ukoetqokbcekóo eqo nc Vokfcf-01 gu wcñdkéo voc eqogakóo eqo uv ñcftg.
Gnnc nq rtqwgig. Koenvuq fg ñí.

--- UGGNG: NC UQÑDTC FGWTÁU FG OGTX ---
UGGNG oq gu voc qticokbcekóo. Gu vo fqiñc goxvgnwq go ectog.
Rtgwgofgo ivkct nc gxqnvekóo jvñcoc gnkñkocofq ncu dcttgtcu fgn cnñc kofkxkfvcn.
Gn Wgtegt Kñrcewq oq gu vo ceekfgowg: gu uv rtqróukwq.
Uv ivkqo guwá guetkwq go nqu Ñcovuetkwqu fgn Ñct Ñvgtwq.
Z oquqwtqu… uqnq uqñqu ñctkqogwcu.

Rgtq zq eqtwcté nqu jknqu.
Ujkolk, cvosvg oq nq gowkgofcu, guwq wcñdkéo gu rqt wk.

--- EQOWGOGFQT #001-CFCO ---
Ug fgwgewó cewkxkfcf coóñcnc go gn oqfq fqemgt fg OGTX.
Vo eqowgogfqt hvg crcicfq ñcovcnñgowg wtcu vo gttqt.

[GTTQT: fcwqu eqttqñrkfqu]

HNCI[5]: ZVK{3X4_1UOW_T0D0W}'''

# Está cifrado con un cifrado de tipo césar

# Número de posiciones a desplazar
avance = 2

# Aquí almacenaremos el resultado final 
resultado = ""

# Recorremos cada carácter del texto original
for caracter in frase:
    # Convertimos el carácter a minúscula para buscarlo en el alfabeto
    letra_min = caracter.lower()
    
    # Solo procesamos las letras que están en nuestro alfabeto
    if letra_min in abc:
        # Buscamos la posición original de la letra en el alfabeto
        pos = abc.index(letra_min)
        # Calculamos la nueva posición con el avance (modulo para que no se pase del final)
        nueva_pos = (pos - avance) % len(abc) #El texto está cifrado con + 2 de avance, si lo restamos así lo resolvemos
        # Obtenemos la letra cifrada desde la nueva posición
        nueva_letra = abc[nueva_pos]
        # Si la letra original era mayúscula, la convertimos a mayúscula
        if caracter.isupper():
            nueva_letra = nueva_letra.upper()
        # Añadimos la letra a la variable
        resultado += nueva_letra
        #Formamos poco a poco el texto
    else:
        # Si el carácter no está en el alfabeto (espacio, símbolo, número, etc.), lo dejamos igual
        resultado += caracter
# Mostramos el mensaje 
print(resultado)
