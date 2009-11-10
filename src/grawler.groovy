/**
 * User: hukash
 * Date: 03.11.2009
 */

class Grawler {
  def counter = 0
  def results = []

  def searchForInjection(pattern, dir, filetype) {
    new File(dir).eachFileRecurse {
      if (it.toString().endsWith(filetype)) {
        try {
          def myMatcher = (it.getText() =~ pattern)
          if (myMatcher.getCount()) {
            counter++
            results << it
          }
        }
        catch (IOException e) {
          println e
        }
      }
    }
  }

  def viewResults() {
    results.each {
      def fileName = it.toString()
      println "Found: $fileName"
    }
    println counter
  }

  def deleteInfectedChunks(pattern) {
    results.each {
      def inFile = new File(it.toString())
      def temp = []
      def outFile = new File(it.toString())
      def counter = 0

      inFile.eachLine {
        def myMatcher = (it.toString() =~ pattern)
        if (myMatcher.getCount()) {
          counter++
          println "infected line: $it"
        } else {
          temp << it.toString() + "\n"
        }
      }
      println "Found malicious code $counter times"
      outFile.write("<?php\n")
      temp.each{
        outFile.append(it.toString())
      }
    }
  }

}

def grawler = new Grawler()
grawler.searchForInjection(/aWYoIWl/, "/Users/lukas/Workspace/grawler/", "php")
grawler.viewResults()
grawler.deleteInfectedChunks(/aWYoIWl/)

// delete lines where the pattern applies

// backup files