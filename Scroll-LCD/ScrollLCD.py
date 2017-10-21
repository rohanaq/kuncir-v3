from time import sleep

def scroll(lcd, text, pause1=False, pause2=False, rep=False):

    # Edit following lines to change timing defaults. Remember you can decide them when you call the function.
    PAUSE_NEXT = 2
    PAUSE_REP = 2
    REPETITIONS = 4
    
    if pause1: PAUSE_NEXT = pause1
    if pause2: PAUSE_REP = pause2
    if rep: REPETITIONS = rep
    
    n = 16
    rows = [text[i:i+n] for i in range(0, len(text), n)]
    n_rows = len(rows)
    for i in range(REPETITIONS):
        for x in range(n_rows):
            lcd.home()
            lcd.clear()
            nxt = x + 1
            lcd.message(rows[x]+"\n")
            if nxt == n_rows:
                sleep(2)
                
                break
            else:
                lcd.message(rows[nxt])
                sleep(PAUSE_REP)
            
    lcd.clear()
