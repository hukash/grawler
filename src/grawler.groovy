/**
 * User: hukash
 * Date: 03.11.2009
 */

def searchFor = /aWYoIWl/

new File('.').eachFileRecurse {
  if (it.toString().endsWith("php")){
    def myMatcher = (it.getText() =~ searchFor)
    if (myMatcher.getCount()){
      println "Found in file: {$it}"
    }
  }
}

/* search */

/* view */

/* delete and create backup */