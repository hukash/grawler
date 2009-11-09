/**
 * User: hukash
 * Date: 03.11.2009
 */

def searchFor = /aWYoIWl/
def counter = 0
def results = []

def searchForInjection(pattern, dir, filetype){
  new File(dir).eachFileRecurse {
    if (it.toString().endsWith(filetype)){
      try {
       def myMatcher = (it.getText() =~ searchFor)
       if (myMatcher.getCount()){
       counter++
       //println "Found in file: {$it}"
       // write result into a list and return list
       results << it
       }
      }
      catch (IOException e) {
        println e
      }
    }
  }
}

// view results
def viewResults(){
  results.each {
    println "Found: {it}"
  }
  println counter
}

def start(){
  searchForInjection(searchFor, ".", "php")
  viewResults()
}
// delete lines where the pattern applies

// backup files