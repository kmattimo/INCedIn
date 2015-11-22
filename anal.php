<?php

// 
// #Function for sentiment analysis that compares words words in
// #sentence to words in GoodWords, BadWords and checks for Inverters
// #like "not" that would invert the meaning of the sentence.
function compareToDictionary(sentence)
{
// def compareToDictionary(sentence, GoodWords, BadWords, inverters):
//     #Compare sentence to keywords and keep count of matches
//     addToGood = 0
//     addToBad = 0
//     shouldInvert = 0
// 
//     for good in GoodWords:
//         if good.lower() in sentence:
//             addToGood = addToGood + 1
// 
//             #Count Bad words
//     for bad in BadWords:
//         if bad.lower() in sentence:
//             addToBad = addToBad + 1
//                         
//             #Look for inverters such as not, never, ...
//     for invert in inverters:
//         if invert.lower() in sentence:
//             shouldInvert = shouldInvert + 1
//             #If inverter found, switch the bad, good count
//     if (shouldInvert>0):
//         temp = addToBad
//         addToBad = addToGood
//         addToGood = temp
//     
//     return (addToGood,addToBad)
}
//         
// 
// #Build the dictionaries from text files.
// GoodWords = []
// with open("PositiveWords.txt", "r") as ins:
//     for line in ins:
//         GoodWords.append(line.rstrip('\n'))
// BadWords = []
// with open("NegativeWords.txt", "r") as ins:
//     for line in ins:
//         BadWords.append(line.rstrip('\n'))
// inverters = []
// with open("InverterWords.txt", "r") as ins:
//     for line in ins:
//         inverters.append(line.rstrip('\n'))
// 
// 
// sentenceString = base64.b64decode(sys.argv[1])
// lol = compareToDictionary(sentenceString, GoodWords, BadWords, inverters)
// print lol[0] - lol[1]
// print sentenceString
// # print 22
// 
function doSentence(string sentence) {
  
    return 2;
}