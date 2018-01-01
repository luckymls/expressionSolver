#Made by @LuckyMls

import re

def solver(op=None):
    
    
    op = op.replace(',','.')
    op = op.replace('^','**')
    op = op.replace('{', '(') 
    op = op.replace('}', ')')
    op = op.replace('[', '(')
    op = op.replace(']', ')')

    pattern = r'(\d+\(|\)\(|\)\d+)'
    i = 0
    for match in re.finditer(pattern, op):
        end = match.end()-1+i
        op = op[:end]+'*'+op[end:]
        i+=1
        
    i = 1

    #Integrity check

    try:
        eval(op)
    except:
        print('Error. Check the expression')
    else:
    
        while op.count('(') > 0:

            pre = op.split(')')[0]
            calc = pre.split('(')[-1]
            res = str(eval(calc))
            op = op.replace('('+calc+')', res)

        
            print(f'Passage {i}: ',op)
            i+=1
        
        print('Result: ',eval(op))



        
while True:
    inp = input('Enter the expression:\n')
    if inp.count('(') != inp.count(')'):
         print('Parenthesis error, check the expression.\n')
    else:
        solver(inp)
